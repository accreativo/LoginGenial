@extends('Publico.Template.index')
@section('titulo')
    LoginGenial | Inicio
@endsection
@section('header')
    @include('Publico.Template.header')
@endsection

@section('content')
    @include('Publico.Login.content')
@endsection

@section('footer')
    @include('Publico.Template.footer')
@endsection
