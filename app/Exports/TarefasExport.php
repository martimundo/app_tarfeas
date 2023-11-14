<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Tarefa::all();
        return auth()->user()->tarefas()->get();
    }

    public function headings(): array
    {
        $heading = [
            'ID Tarefas',
            'ID Usuário',
            'Desc. Tarefa',
            'Dt. Limite',
            'Dt. Criação',
            'Dt. Atualização'
        ];
        return $heading;
    }

    public function map($linha): array
    {

        return[
            $linha->id,
            $linha->user_id,
            $linha->tarefa,
            date('d/m/Y', strtotime($linha->data_limite_conclusao)),
            date('d/m/Y', strtotime($linha->created_at)),
            date('d/m/Y', strtotime($linha->updated_at)),
        ];
    }
}
