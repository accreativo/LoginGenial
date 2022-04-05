@component('Components.Modals.modal')
    @slot('modal_id','statusModal')
    @slot('modal_titulo') <i class="fas fa-server"></i> Mensaje del Sistema @endslot
    @slot('modal_body')
        {{ $status }}
    @endslot
@endcomponent
