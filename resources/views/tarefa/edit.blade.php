@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white fw-normal">{{ __('Atualizar Tarefa') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('tarefa.update', $tarefa->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Descrição</label>
                                <input type="text" class="form-control @error('tarefa') is-invalid @enderror"
                                    name="tarefa" value="{{$tarefa->tarefa ?? old('tarefa')}}">
                                <div id="emailHelp" class="form-text">Descreva a sua tarefa</div>
                                @error('tarefa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Data Limite</label>
                                <input type="date"
                                    class="form-control @error('data_limite_conclusao') is-invalid @enderror"
                                    name="data_limite_conclusao" value="{{$tarefa->data_limite_conclusao ?? old('data_limite_conclusao')}}">
                                <div class="form-text">Prazo para Entrega da Tarefa</div>
                                @error('data_limite_conclusao')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </form>
                        <div class="mt-3">
                            <a href="{{ route('tarefa.index') }}" class="btn btn-outline-success">Listar Tarefas</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
