<div class="card mb-3 shadow-sm">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <img src="{{asset($item->icono)}}" class="mr-3">
            <p class="mb-0">{{$item->nombre}}</p>
        </div>
    </div>
    <div class="card-body">
        <ul>
            @foreach ($item->subrubros as $subitem)
                <li>
                    <a href="{{route('webSubRubro', ['tkn_rubro_subrubro' => $subitem->tkn])}}">
                        {{$subitem->nombre}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
