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
                        @foreach ($tarefas as $tarefa)
                            <tr>
                                <td scope="row">{{ $tarefa->id }}</td>
                                <td scope="row">{{ $tarefa->tarefa }}</td>                               
                                <td scope="row">{{ date('d/m/y', strtotime($tarefa->data_limite_conclusao)) }}</td>

                                <td>
                                    <a href="{{ route('tarefa.show', ['tarefa' => $tarefa->id]) }}"
                                        class="btn btn-outline-info btn-sm">Detalhes</a>
                                </td>
                                <td>
                                    <form id="form_{{ $tarefa->id }}"
                                        action="{{ route('tarefa.destroy', ['tarefa' => $tarefa->id]) }}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#"class="btn btn-outline-danger btn-sm"
                                            onclick="document.getElementById('form_{{ $tarefa->id }}').submit()">Excluir</a>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('tarefa.exportar', ['extensao' => 'xlsx']) }}" 
                                class="btn btn-success btn-sm mb-2"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Exportar XLSX">
                                <i class="fa-regular fa-file-excel"></i> Exportar(.xlsx)</a>

                            <a href="{{ route('tarefa.exportar', ['extensao' => 'csv']) }}" 
                                class="btn btn-info btn-sm mb-2" data-bs-toggle="tooltip" 
                                data-bs-placement="top" title="Exportar CSV">
                                <i class="fa-regular fa-file-excel"></i> Exportar(.csv)</a>

                            <a href="{{ route('tarefa.exportar', ['extensao' => 'pdf']) }}" 
                                class="btn btn-danger btn-sm mb-2"data-bs-toggle="tooltip" 
                                data-bs-placement="top" title="Exportar PDF">
                                <i class="fa-regular fa-file-pdf"></i>Exportar(.pdf)</a>
                        </div>
                    </div>
                </table>

                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>
                        @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                            <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }} "><a class="page-link"
                                    href="{{ $tarefas->url($i) }}">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Próximo</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
