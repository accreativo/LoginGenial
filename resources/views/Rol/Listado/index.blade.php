@extends('Shared.Template.index')
@section('titulo')
    CrackenMLM
@endsection
@section('header')
    @include('Shared.Template.header')
@endsection
@section('style_libraries')

@endsection

@section('content')
    @include('Rol.Listado.content')
@endsection

@section('footer')
    @include('Shared.Template.footer')
@endsection

@section('script_libraries')

@endsection
