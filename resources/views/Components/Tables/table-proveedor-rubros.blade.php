@component('Components.Tables.table')
    @slot('table_cabeceras')
        <th>Item</th>
        <th class="text-left">Rubro</th>
        <th>Acciones</th>
    @endslot
    @slot('table_registros')
        @if ($proveedor_rubros->count() > 0)
            @php $i = 1 @endphp
            @foreach ($proveedor_rubros as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="text-left">{{$item->rubro->nombre}}</td>
                    <td>
                        <a href="{{route('proveedorRubro', ['tkn_proveedor_rubro' => $item->tkn])}}">
                            Editar
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif
    @endslot
@endcomponent
