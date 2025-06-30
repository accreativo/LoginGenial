@extends('Shared.Components.Cards.card-base-form')
@section('card_content')
    <div class="row row-gap-3">
        <div class="col-12">
            <h5>Listado de Roles</h5>
        </div>
        <div class="col-12">
            @component('Shared.Components.Tables.table-rol-listado', [
                'items' => $roles
            ]) @endcomponent
        </div>
    </div>
@endsection
