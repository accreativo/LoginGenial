<section class="container-fluid h-100 pt-3 pb-5 px-0">
    <div class="row w-100">
        <div class="col-12">
            <div class="container">
                <div class="row row-gap-4">
                    <div class="col-1">
                        @component('Shared.Components.Headers.menu', [
                            'icono_link' => '#dashboard',
                            'options' => [
                                [
                                    'hasSubmenu' => false,
                                    'icono' => 'fa-solid fa-money-bills',
                                    'link' => '#comisiones',
                                    'tooltip' => 'Comisiones'
                                ],
                                [
                                    'hasSubmenu' => false,
                                    'icono' => 'fa-solid fa-wallet',
                                    'link' => '#wallet',
                                    'tooltip' => 'Wallet'
                                ],
                                [
                                    'hasSubmenu' => false,
                                    'icono' => 'fa-solid fa-chart-simple',
                                    'link' => '#reportes',
                                    'tooltip' => 'Reportes'
                                ],
                                [
                                    'hasSubmenu' => true,
                                    'options' => [
                                        [
                                            'link' => '#Subopcion',
                                            'nombre' => 'Sub-opcion'
                                        ]
                                    ],
                                    'icono' => 'fa-solid fa-circle-nodes',
                                    'tooltip' => 'Equipo'
                                ],
                            ]
                        ]) @endcomponent
                    </div>
                    <div class="col">
                        <div class="row row-gap-4">
                            <div class="col-12">
                                {{$header}}
                            </div>
                            <div class="col-12">
                                {{$content}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
