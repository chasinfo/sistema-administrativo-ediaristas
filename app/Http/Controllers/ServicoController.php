<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    private String $titulo = "Serviços";
    
    public function index()
    {
        $servicos   = Servico::paginate(env('PAGE_LIMIT'));

        return view('servicos.index')->with([
            'servicos'  => $servicos,
            'titulo'    => $this->titulo
        ]);
    }

    public function create()
    {
        return view('servicos.create')->with([
            'titulo'        => $this->titulo,
            'tituloCreate'  => "Cadastrar Serviços",
            'urlForm' => route('servicos.store')
        ]);
    }

    public function store(ServicoRequest $request)
    {
        $dados = $request->except('_token');
        Servico::create($dados);
        
        return redirect()->route('servicos.index');
    }

    public function edit(int $id)
    {
        $servico = Servico::findOrFail($id);

        return view('servicos.edit')->with([
            'titulo'     => $this->titulo,
            'tituloEdit' => "Alterar Serviços",
            'urlForm'    => route('servicos.update', $id),
            'servico'    => $servico
        ]);
    }

    public function update(int $id, ServicoRequest $request)
    {
        $dados   = $request->except(['_token', '_method']);
        $servico = Servico::findOrFail($id);

        $servico->update($dados);

        return redirect()->route('servicos.index');
        
    }

    public function delete(Request $request)
    {
        Servico::destroy($request['id_servico']);
        
        return redirect()->route('servicos.index');
    }
}
