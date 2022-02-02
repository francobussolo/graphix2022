<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use DataTables;

class PriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('price.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'value' => 'required',
            'trim' => 'required',
            'active' => 'nullable',
            'client_id' => 'required',
        ]);

        //dd($v);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v)->withInput();
        } 
        
        Price::create($request->all());
        return redirect()->route('price.index')->with('success','Tabela de preço cadastrada com sucesso!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::find($id);

        return view('price.edit',compact('price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'value' => 'required',
            'trim' => 'required',
            'active' => 'nullable',
            'client_id' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v)->withInput();
        }

        $price->update($request->all());
        
        return redirect()->route('price.index')->with('success','Tabela de preço atualizado com sucesso!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()->route('price.index')->with('success','Tabela de preço excluida com sucesso!.');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Price::All();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(Price $price){
                            $btn = '
                            <form method="POST" action="'.route("price.destroy",$price->id).'">
                                <input type="hidden" name="_token" value="'. csrf_token() . '" />
                                <input name="_method" type="hidden" value="DELETE">
                                <a href="'.route("price.edit",$price->id).'" class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a> 
                                <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm(\''. "Dejesa realmente excluir $price->name" .'\')" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->editColumn('client_id', function(Price $price) {
                        return $price->client->short_name;
                    })
                    ->make(true);
        }
    }    
}
