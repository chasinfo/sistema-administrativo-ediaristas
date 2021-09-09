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
    <div class="card">
        <div class="card-body table-responsive p-0" >
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($servicos as $servico)
                        <tr>
                            <td>{{ $servico->id }}</td>
                            <td>{{ $servico->nome }}</td>
                            <td style="width: 49px"><a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-block btn-info btn-xs"><i class="fa fa-edit" title="Alterar"></i></a></td>
                            <td style="width: 49px">
                                <form action="{{ route('servicos.delete') }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" value="{{ $servico->id }}" name="id_servico">
                                    <button type="submit" class="btn btn-block btn-danger btn-xs"><i class="fa fa-eraser" title="Excluir"></i></button>                                    
                                </form>
                            </td>
                        </tr>    
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center">NENHUM REGISTRO FOI ENCONTRADO</td>
                        </tr>    
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex">
            <div class="p-2">
                {{$servicos->links()}}    
            </div>
            <div class="ml-auto p-2">
                <a href="{{ route('servicos.create') }}" class="btn btn-block btn-primary btn-sm">Novo Serviço</a>
            </div>
        </div>

    </div>

@stop

@section('css')

@stop

@section('js')

@stop