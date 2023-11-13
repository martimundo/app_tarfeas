<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class TarefaController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::check()) {
            $user_id = auth()->user()->id;
            $user = User::all();
            $tarefas = Tarefa::where('user_id', $user_id)->paginate(10);
            return view('tarefa.index', compact('tarefas', 'user'));
        } else {
            return view('error_404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;

        //dd($dados);

        $request->validate([

            'tarefa' => 'required|max:255',
            'data_limite_conclusao' => 'required'
        ]);

        $tarefa = Tarefa::create($dados);

        $destinatario = auth()->user()->email;
        Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if ($tarefa->user_id == $user_id) {

            return view('tarefa.edit', compact('tarefa'));
        }
        return view('acesso_negado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $user_id = auth()->user()->id;
        if ($tarefa->user_id == $user_id) {

            $tarefa->update($request->all());
            return redirect()->route('tarefa.index');
        }
        return view('acesso_negado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        //dd($tarefa);        
        if (!$tarefa->user_id == auth()->user()->id) {
            return view('acesso_negado');
        }
        $tarefa->delete();
        return redirect()->route('tarefa.index');
    }

    public function exportacao($extensao)
    {        
        
        if(in_array($extensao,['xlsx','csv','pdf'])){
            return Excel::download(new TarefasExport, 'terafa.'.$extensao);
        }
        return redirect()->route('tarefa.index');
        
        // if ($extensao == 'csv') {

        //     $nome_arquivo .= '.' . $extensao;
        // } else if ($extensao == 'xlsx') {

        //     $nome_arquivo .= '.' . $extensao;

        // } else if ($extensao == 'pdf') {

        //     $nome_arquivo .= '.' . $extensao;

        // } else {

        //     return redirect()->route('tarefa.index');
        // }


       
    }
}
