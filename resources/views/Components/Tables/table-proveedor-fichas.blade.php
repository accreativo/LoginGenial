@component('Components.Tables.table')
    @slot('table_cabeceras')
        <th>Tipo</th>
        <th class="text-left">Subrubro</th>
        <th>Vigencia</th>
        <th>Acciones</th>
    @endslot
    @slot('table_registros')
        @if (count($fichas) > 0)
            @foreach ($fichas as $item)
                <tr>
                    <td>{{$item->tipo}}</td>
                    <td class="text-left">{{$item->subrubro->nombre}}</td>
                    <td>{{$item->vigencia}}</td>
                    <td>
                        <a href="{{route('proveedorFicha', ['tkn_proveedor_ficha' => $item->tkn])}}">
                            Editar Ficha
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    @endslot
@endcomponent

