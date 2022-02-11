@extends('layouts.app')

@push('js')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.3/dataRender/ellipsis.js" defer></script>
    
    <script type="text/javascript">
    $(function () {
        var table = $('#ClientsList').DataTable({

            processing: true,
            serverSide: true,
            ajax: "{{ route('client.list') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'phone', name: 'phone'},
                {data: 'email', name: 'email'},
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
<div class="py-4 container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="wrapper">
                <h4 class="bg-title-graphix">{{ __('List Clients') }}</h4>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif           

                    <table id="ClientsList" class="table table-striped table-hover table-sm display compact" style="width:97%" >
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Phone') }}</th>
                            <th scope="col">{{ __('e-mail') }}</th>
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