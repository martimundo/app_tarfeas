@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Acesso negado') }}</div>

                <div class="card-body">
                    <p class="text-danger">Acesso Negado</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
