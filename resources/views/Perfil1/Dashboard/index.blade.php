@extends('Perfil1.Template.index')
@section('titulo')
    LoginGenial | Perfil1
@endsection
@section('header')
    @include('Perfil1.Template.header')
@endsection

@section('content')
    @include('Perfil1.Dashboard.content')
@endsection

@section('footer')
    @include('Perfil1.Template.footer')
@endsection
