@extends('layouts.main_layout') {{-- Irá fazer parte desta view ( pasta layout - View main_layout ) --}}

{{-- O conteúdo desta view que será exportado fica entre sessões - section('nome da section que irá ser exportada') --}}
@section('conteudo')
    <h1>Bem vindo a view Principal</h1>
    <hr>
    <h3>The Value is : {{ $value}}</h3>
@endsection
