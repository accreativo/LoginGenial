{{-- Version1 --}}
{{-- <div class="d-flex flex-wrap justify-content-center" style="gap: 2rem;">

    @component('Shared.Components.Headers.menu-option-with-submenu') @endcomponent
    @component('Shared.Components.Headers.menu-option') @endcomponent
</div> --}}

{{-- Version2 --}}
<div class="card card-custom shadow px-2 py-3">
    <div class="row row-gap-4">
        <div class="col-12 text-center">
            <a href="{{$icono_link}}">
                <img src="{{asset('img/logos/login.png')}}" style="width: 3rem;" alt="">
            </a>
        </div>
        <div class="col-12">
            <div class="row">
                @foreach ($options as $item)
                <div class="col-12">
                    @if ($item['hasSubmenu'])
                        @component('Shared.Components.Headers.menu-option-with-submenu', [
                            'icono' => $item['icono'],
                            'options' => $item['options'],
                            'tooltip' => $item['tooltip']
                        ]) @endcomponent
                    @else
                        @component('Shared.Components.Headers.menu-option', [
                            'icono' => $item['icono'],
                            'link' => $item['link'],
                            'tooltip' => $item['tooltip']
                        ]) @endcomponent
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
