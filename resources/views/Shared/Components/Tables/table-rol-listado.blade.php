@component('Shared.Components.Tables.table')
    @slot('table_cabeceras')
        <th></th>
        <th>Nombre</th>
        <th>Estado</th>
    @endslot
    @slot('table_registros')
        @if (count($items) > 0)
            @foreach ($items as $item)
                <tr>
                    <td>
                        <a type="button" class="dropdown-toggle text-light btn px-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical m-0"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <button type="button" class="dropdown-item">Operaciones</button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item">Stock Mínimo</button>
                            </li>
                        </ul>
                    </td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->fl_estado}}</td>
                </tr>
            @endforeach
        @endif
    @endslot
@endcomponent
