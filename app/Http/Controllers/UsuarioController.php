<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    private String $titulo = "Usuários";

    public function index()
    {
        $usuarios = User::paginate(env('PAGE_LIMIT'));
        
        return view('usuarios.index')->with([
            'usuarios' => $usuarios,
            'titulo'   => $this->titulo
        ]);
    }

    public function create()
    {
        return view('usuarios.create')->with([
            'titulo'        => $this->titulo,
            'tituloCreate'  => "Cadastrar Usuário",
            'urlForm' => route('usuarios.store')
        ]);
    }

    public function store(UsuarioRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')
                         ->with('mensagem', 'Usuário criado com sucesso!!!');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit')->with([
            'titulo'     => $this->titulo,
            'tituloEdit' => "Alterar Usuário",
            'urlForm'    => route('usuarios.update', $usuario),
            'usuario'    => $usuario
        ]);
    }

    public function update(User $usuario, UsuarioRequest $request)
    {
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')
                         ->with('mensagem', 'Usuário atualizado com sucesso!!!');
    }

    public function destroy(User $usuario)
    {
        User::destroy($usuario->id);
        
        return redirect()->route('usuarios.index')
                         ->with('mensagem', 'Usuario excluído com sucesso!!!');
    }
}
