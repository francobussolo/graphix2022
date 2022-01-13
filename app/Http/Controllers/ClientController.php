<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DataTables;


class ClientController extends Controller
{
    public function __construct()
    {
        // Nesse caso o middleware auth será aplicado a todos os métodos
        $this->middleware('auth');

        // mas, você pode fazer uso dos métodos fluentes: only e except
        // ex.: $this->middleware('auth')->only(['create', 'store']);
        // ex.: $this->middleware('auth')->except('index');
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255','unique:clients'],
            'short_name' => ['required', 'string', 'max:50'],
            'cnpj' => ['string'],
            'phone' => ['string', 'max:15', 'min:8'],
            'email' => ['string', 'email', 'max:255'],
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v)->withInput();
        } 
        
        Client::create($request->all());
        return redirect()->route('client.index')->with('success','Cliente cadastrado com sucesso!.');
        
    }

    public function edit($id)
    {
        $client = Client::find($id);

        return view('client.edit',compact('client'));
    }

    public function update(Request $request, Client $client)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:255'. $client->id,
            'short_name' => ['required', 'string', 'max:50'],
            'cnpj' => ['string'],
            'phone' => ['string', 'max:15', 'min:8'],
            'email' => ['string', 'email', 'max:255'],
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v)->withInput();
        }

        $client->update($request->all());
        
        return redirect()->route('client.index')->with('success','Cliente atualizado com sucesso!.');

    }
    
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('client.index')->with('success','Cliente apagado com sucesso!.');
    }    

    public function index()
    {
        return view('client.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::All();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function( Client $client){
                            $btn = '
                            <form method="POST" action="'.route("client.destroy",$client->id).'">
                                <input type="hidden" name="_token" value="'. csrf_token() . '" />
                                <input name="_method" type="hidden" value="DELETE">
                                <a href="'.route("client.edit",$client->id).'" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a> 
                                <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm(\''. "Dejesa realmente excluir $client->short_name" .'\')" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function searchClient(Request $request)
    {
        $search = $request->get('term');
        //$result = Client::where('razao_social', 'LIKE', '%'. $search. '%')->get();        
 
        $result = Client::select('name','id')
            ->where('name', 'LIKE', '%'. $search. '%')
            ->get();
        return response()->json($result);
    }    
}
