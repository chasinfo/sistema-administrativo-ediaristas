@extends('adminlte::page')

@section('title', $titulo)

@section('content_header')
    <div class="d-flex">
        <div class="p-2">
            <h4>
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route("usuarios.index") }}">{{ $titulo }}</a></li>
                    <li class="breadcrumb-item active">{{ $tituloCreate }}</li>
                </ol>
            </h4>
        </div>
    </div>
@stop

@section('content')
    @include('_mensagens')
    <form action="{{ $urlForm }}" method="post">
        @include('usuarios._form')
    </form>
@stop

@section('css')

@stop

