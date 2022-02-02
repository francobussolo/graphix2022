@extends('layouts.app')

@push('js')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.3/dataRender/ellipsis.js" defer></script>
    
    <script type="text/javascript">
        $(function () {
            var table = $('#PriceList').DataTable({
    
                processing: true,
                serverSide: true,
                ajax: "{{ route('price.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'client_id', name: 'client_id'},
                    {data: 'name', name: 'name'},
                    {data: 'value', name: 'value'},
                    {data: 'trim', name: 'trim'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                columnDefs: [ {
                    targets: [1, 3],
                    render: $.fn.dataTable.render.ellipsis(30)
                } ],
                language: {
                        "url": "/js/Portuguese-Brasil.json"
                },
            });
         
        });        
        </script>
@endpush

@push('js')
    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="py-4 container ct-gpx">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h4 class="card-header bg-title-graphix">{{ __('Tabelas de Preço') }}</h4>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif           

                    <table id="PriceList" class="table table-striped table-hover table-sm display compact" style="width:97%" >
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('Cliente') }}</th>
                            <th scope="col">{{ __('Descrição') }}</th>
                            <th scope="col">{{ __('Valor') }}</th>
                            <th scope="col">{{ __('Apara') }}</th>
                            <th scope="col">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    
            </div>
        </div>
    </div>
</div>
@endsection