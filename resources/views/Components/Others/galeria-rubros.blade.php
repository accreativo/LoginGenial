<section class="galeria-rubros">
    <div class="contenido container-fluid">
        <div class="card-columns">
            @foreach ($rubros as $item)
                @component('Components.Cards.card-rubro', [
                    'item' => $item,
                ]) @endcomponent
            @endforeach
        </div>
    </div>
</section>
