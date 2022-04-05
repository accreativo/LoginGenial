@component('Components.Tables.table')
    @slot('table_cabeceras')
        <th>Orden</th>
        <th>Precio</th>
        <th>Menciones</th>
        <th>Anuncios</th>
        <th>Vigencia</th>
        <th>Acciones</th>
    @endslot
    @slot('table_registros')
        @if ($planes->count() > 0)
            @foreach ($planes as $item)
                <tr>
                    <td>{{$item->orden}}</td>
                    <td>{{$item->precio}}</td>
                    <td>{{$item->cantidad_mencion}}</td>
                    <td>{{$item->cantidad_anuncio}}</td>
                    <td>{{$item->fecha_vigencia}}</td>
                    <td>
                        @if ($item->fichas_disponibles)
                            <a href="{{route('proveedorPlanFichas', ['tkn_proveedor_plan' => $item->tkn])}}">
                                Fichas Disponbibles
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    @endslot
@endcomponent
