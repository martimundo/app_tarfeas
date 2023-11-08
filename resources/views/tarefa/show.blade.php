@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-end fw-bold text-danger">Id: {{ $tarefa->id }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div >
                                <label for="" class="fw-bold">Descrição: </label>
                                <input type="text" class="form-control " disabled value="{{ $tarefa->tarefa }}">
                            </div>

                        </div>

                        <div>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm mt-3">Voltar</a>
                            <a href="{{ route('tarefa.edit', $tarefa->id) }}"
                                class="btn btn-success btn-sm mt-3">Atualizar</a>
                        </div>
                        
                        <div class="row mt-2">
                            
                            <div class="col-4">
                                <spam class="text-success">Data de
                                    Criação:{{ date('d-m-y', strtotime($tarefa->created_at)) }}</spam>
                            </div>
                            <spam class="text-danger">Data de Edição:{{ date('d-m-y', strtotime($tarefa->updated_at)) }}
                            </spam>
                            <spam>Dt Limite: {{ date('d-m-Y', strtotime($tarefa->data_limite_conclusao)) }}</spam>
                                
                            <spam class="text-info text-fw">Usuário: {{ $tarefa->user_id }}</spam>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
