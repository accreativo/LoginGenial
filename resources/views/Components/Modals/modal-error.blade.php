@component('Components.Modals.modal')
    @slot('modal_id','errorModal')
    @slot('modal_titulo') <i class="fas fa-server"></i> Mensaje del Sistema @endslot
    @slot('modal_body')
        @foreach ($errors as $item)
            {{ $item }}<br>
        @endforeach
    @endslot
@endcomponent
