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
        $servicos = Servico::paginate(env('PAGE_LIMIT'));

        return view('servicos.index')->with([
            'servicos'  => $servicos,
            'titulo'    => $this->titulo
        ]);
    }

    public function create()
    {
        return view('servicos.create')->with([
            'titulo'        => $this->titulo,
            'tituloCreate'  => "Cadastrar Serviço",
            'urlForm' => route('servicos.store')
        ]);
    }

    public function store(ServicoRequest $request)
    {
        $dados = $request->except('_token');
        Servico::create($dados);
        
        return redirect()->route('servicos.index')
                         ->with('mensagem', 'Serviço criado com sucesso!!!');
    }

    public function edit(Servico $servico)
    {
        return view('servicos.edit')->with([
            'titulo'     => $this->titulo,
            'tituloEdit' => "Alterar Serviço",
            'urlForm'    => route('servicos.update', $servico),
            'servico'    => $servico
        ]);
    }

    public function update(Servico $servico, ServicoRequest $request)
    {
        $dados   = $request->except(['_token', '_method']);

        $servico->update($dados);

        return redirect()->route('servicos.index')
                         ->with('mensagem', 'Serviço atualizado com sucesso!!!');
        
    }

    public function destroy(Servico $servico)
    {
        Servico::destroy($servico->id);
        
        return redirect()->route('servicos.index')
                         ->with('mensagem', 'Serviço excluído com sucesso!!!');
    }
}
