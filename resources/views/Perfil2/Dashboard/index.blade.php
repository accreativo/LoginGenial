@extends('Perfil2.Template.index')
@section('titulo')
    LoginGenial | Perfil2
@endsection
@section('header')
    @include('Perfil2.Template.header')
@endsection

@section('content')
    @include('Perfil2.Dashboard.content')
@endsection

@section('footer')
    @include('Perfil2.Template.footer')
@endsection
