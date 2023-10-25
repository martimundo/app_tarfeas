@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white fw-normal">{{ __('Adicionar Tarefa') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('tarefa.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                <input type="text" class="form-control @error('tarefa') is-invalid @enderror"
                                    name="tarefa" value="{{old('tarefa')}}">
                                <div id="emailHelp" class="form-text">Descreva a sua tarefa</div>
                                @error('tarefa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data Limite</label>
                                <input type="date"
                                    class="form-control @error('data_limite_conclusao') is-invalid @enderror"
                                    name="data_limite_conclusao" value="{{old('data_limite_conclusao')}}">
                                <div class="form-text">Prazo para Entrega da Tarefa</div>
                                @error('data_limite_conclusao')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                        <div class="mb-3">
                            <a href="{{ route('tarefa.index') }}" class="btn btn-outline-success">Listar Tarefas</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
