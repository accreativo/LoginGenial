@component('Shared.Components.Containers.layout-publico')
    @slot('content')
        <div class="row">
            <div class="col-12">
                @component('Shared.Components.Cards.card-registro') @endcomponent
            </div>
        </div>
    @endslot
@endcomponent
