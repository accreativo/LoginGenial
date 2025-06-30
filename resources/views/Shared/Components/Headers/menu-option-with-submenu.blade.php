<a href="#" class="dropdown-toggle menu-option" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="{{$icono}}" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$tooltip}}"></i>
</a>
<ul class="dropdown-menu">
    @foreach ($options as $item)
        <li>
            <a class="dropdown-item" href="{{$item['link']}}">
                {{$item['nombre']}}
            </a>
        </li>
    @endforeach
</ul>
