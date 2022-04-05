@component('Components.Tables.table')
    @slot('table_cabeceras')
        <th>Tipo</th>
        <th>Utilizado</th>
        <th>Acciones</th>
    @endslot
    @slot('table_registros')
        @if (count($fichas) > 0)
            @for ($i = 0; $i < $fichas['anuncios']; $i++)
                <tr>
                    <td>Anuncio</td>
                    <td>No</td>
                    <td>
                        <a href="{{route('proveedorPlanFichaConfiguracion', [
                            'tkn_proveedor_plan' => $fichas['plan'],
                            'fl_anuncio' => 'mencion',
                        ])}}">Crear Ficha</a>
                    </td>
                </tr>
            @endfor
            @for ($i = 0; $i < $fichas['menciones']; $i++)
                <tr>
                    <td>Mención</td>
                    <td>No</td>
                    <td>
                        <a href="{{route('proveedorPlanFichaConfiguracion', [
                            'tkn_proveedor_plan' => $fichas['plan'],
                            'fl_anuncio' => 'mencion',
                        ])}}">Crear Ficha</a>
                    </td>
                </tr>
            @endfor
        @endif
    @endslot
@endcomponent

