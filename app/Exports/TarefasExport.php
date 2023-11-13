<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Tarefa::all();
        return auth()->user()->tarefas()->get();
    }

    public function headings():array
    {
        $heading = ['ID Tarefas', 'ID Usuário','Desc. Tarefa','Dt. Limite','Dt. Criação','Dt. Atualização' ];
        return $heading;
    }
}
