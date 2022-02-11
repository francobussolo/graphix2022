@extends('layouts.app')

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="{{ url('js/jquery.mask.min.js') }}" defer></script>
<script src="{{ url('js/create.price.js') }}" defer></script>
@endpush

@section('content')
<div class="py-4 container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="wrapper">
                <h4 class="bg-title-graphix">{{ __('Nova Tabela de Preço') }}</h4>
                <form method="POST" action="{{ route('price.store') }}" >
                    
                        @csrf
<div class="row">
                        <div class="col-md-12">
                            <label for="client">{{ __('Cliente ') }}</label>
                            <input type="text" class="form-control typeahead" id="client" name="client" value="{{ old('client') }}"
                                placeholder="Razão Social do Cliente" data-provide="typeahead" required autocomplete="off">
                            <input type="hidden" name="client_id" id="client_id" value="{{ old('client_id') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="name">Descrição:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Descrição Tabela de Preço" required>
                        </div>
                        <div class="col-md-4">
                            <label for="value">{{ __('Valor') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">R$</span>
                                </div>
                                <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}"
                                    aria-describedby="basic-addon1" placeholder="Valor do cm²" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="trim">Apara (cm):</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="trim" name="trim" step="0.5" value="{{ old('trim') }}"
                                    aria-describedby="basic-addon2" placeholder="Quantidade cm para refile" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2">cm</span>
                                </div>
                            </div>
                        </div>


                    <div class="form-row">
                        <div class="form-group offset-md-9 col-md-3">
                            <div class="form-check">
                            <input type="hidden" value="0" name="active">
                                <input class="form-check-input" type="checkbox" value="1" checked id="active"
                                    name="active">
                                <label class="form-check-label" for="active">
                                    Tabela de Preço Ativa?
                                </label>
                            </div>
                        </div>
</div>

<div class="form-row">
                        <button type="submit" class="btn btn-primary btn-submit col-md-1">{{ __('Save') }}</button>
                        <button type="reset" id="reset" class="btn btn-secondary col-md-1">{{ __('Clear') }}</button>
</div>                
</div>    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection