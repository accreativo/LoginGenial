@component('Shared.Components.Containers.layout-back-office')
    @slot('header')
        @component('Shared.Components.Headers.header') @endcomponent
    @endslot
    @slot('content')
        <div class="row">
            <div class="col-12">
                @component('Shared.Components.Cards.card-rol-listado', [
                    'roles' => $roles
                ]) @endcomponent
            </div>
        </div>
    @endslot
@endcomponent
