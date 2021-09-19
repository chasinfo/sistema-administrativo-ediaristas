@extends('adminlte::page')

@section('title', $titulo)

@section('content_header')
    <div class="d-flex">    
        <div class="p-2">
            <h4>
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">{{ $titulo }}</li>
                </ol>
            </h4>
        </div>
    </div>
@stop

@section('content')
    @include('_mensagens_sessao')
    <div class="card">
        <div class="card-body table-responsive p-0" >
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td style="width: 49px">
                                <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-block btn-info btn-xs"><i class="fa fa-edit" title="Alterar"></i></a>
                            </td>
                            <td style="width: 49px">
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-danger btn-xs" onclick="return confirm('Tem certeza que deseja excluir este registro?')">
                                        <i class="fa fa-eraser" title="Excluir"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>    
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center">NENHUM REGISTRO FOI ENCONTRADO</td>
                        </tr>    
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex">
            <div class="p-2">
                {{$usuarios->links()}}    
            </div>
            <div class="ml-auto p-2">
                <a href="{{ route('usuarios.create') }}" class="btn btn-block btn-primary">Novo Serviço</a>
            </div>
        </div>

    </div>

@stop

@section('css')

@stop

@section('js')

@stop