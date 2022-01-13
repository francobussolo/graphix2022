@extends('layouts.app')

@push('js')
    <script src="{{ url('js/jquery.mask.min.js') }}" defer></script>
    <script src="{{ url('js/create.client.js') }}" defer></script>
@endpush

@section('content')
<div class="py-4 container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <h4 class="card-header bg-title-graphix">{{ __('Edit Client') }}</h4>              
                    <form method="POST" action="{{ route('client.update',$client->id) }}">
                        <div class="card-body row g-3">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?: $client->name }}" placeholder="{{ __('Client name') }}" required>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif 
                        </div>
                        
                        <div class="col-md-5">
                            <label for="short_name" class="form-label">{{ __('Short name') }}</label>
                            <input type="text" class="form-control" name="short_name" id="short_name" value="{{ old('short_name') ?: $client->short_name }}" placeholder="{{ __('Short name') }}" required>
                            @if ($errors->has('short_name'))
                                <span class="text-danger">{{ $errors->first('short_name') }}</span>
                            @endif 
                        </div>
                        
                        <div class="col-md-5 offset-md-1">
                            <label for="cnpj" class="form-label">{{ __('CNPJ') }}</label>
                            <input type="text" class="form-control" name="cnpj" id="cnpj" value="{{ old('cnpj') ?: $client->cnpj }}" placeholder="{{ __('CNPJ') }}" required>
                            @if ($errors->has('cnpj'))
                                <span class="text-danger">{{ $errors->first('cnpj') }}</span>
                            @endif 
                        </div>

                        <div class="col-md-5">
                            <label for="phone" class="form-label">{{ __('Phone') }}</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') ?: $client->phone }}" placeholder="{{ __('Telefone de contato') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif 
                        </div>
                        
                        <div class="col-md-5 offset-md-1">
                            <label for="email" class="form-label">{{ __('e-mail') }}</label>
                            <input type="mail" class="form-control" name="email" id="email" value="{{ old('email') ?: $client->email }}" placeholder="{{ __('endereço de e-mail') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif 
                        </div> 
                        
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection