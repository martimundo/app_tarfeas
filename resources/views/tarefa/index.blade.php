@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="text-center text-success">Listagem de Tarefas</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Tarefa</th>
                            <th scope="col">Data Limite</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tarefas as $tarefa)
                        <tr>
                            <td scope="row">{{$tarefa->id}}</td>
                            <td scope="row">{{$tarefa->tarefa}}</td>
                            <td scope="row">{{date('d-m-y', strtotime($tarefa->data_limite_conclusao))}}</td>
                            <td colspan="3">
                                <a href="{{route('tarefa.create')}}" class="btn btn-outline-info btn-sm">Nova Tarefa</a>
                                <a href="{{route('tarefa.show',['tarefa'=>$tarefa->id])}}" class="btn btn-outline-warning btn-sm">Detalhes</a>
                                <a href=""class="btn btn-outline-danger btn-sm">Excluir</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection