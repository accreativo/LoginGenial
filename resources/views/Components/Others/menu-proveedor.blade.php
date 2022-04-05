<section class="mi-perfil">
    <div class="container-fluid contenido">
        <div class="row justify-content-center">
            <div class="col-2">
                <div class="row flex-column menu">
                    <a href="{{route('proveedorDatos')}}">Mis Datos</a>
                    <a href="{{route('proveedorPlanes')}}">Mis Planes</a>
                    <a href="{{route('proveedorFichas')}}">Mis Fichas</a>
                    @if (session('fl_proveedor_pro'))
                        <a href="#">Mis Cotizaciones</a>
                    @endif
                    <a href="#">Mis Favoritos</a>
                    <a href="#">Mis Mensajes</a>
                    @if (!session('fl_proveedor_pro'))
                        <a href="#" class="tag-orange">Conviértete en PRO</a>
                    @endif
                </div>
            </div>
            <div class="col-10 separdor-vertical">
                {{$contenido}}
            </div>
        </div>
    </div>
</section>
