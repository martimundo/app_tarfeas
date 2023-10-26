@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-end fw-bold text-danger">Id: {{$tarefa->id}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row"> 
                        <div class="col-6">
                            <label for="" class="fw-bold">Descrição: </label>
                            {{$tarefa->tarefa}}                            
                        </div>
                        <div class="col-6">
                            <label for=""class="fw-bold">Dt Limite: </label>
                            {{date('d-m-Y', strtotime($tarefa->data_limite_conclusao))}}
                        </div>
                    </div>
                    <div>
                        <a href="{{url()->previous()}}" class="btn btn-secondary btn-sm mt-3">Voltar</a>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
