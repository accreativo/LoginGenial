<section class="mi-perfil">
    <div class="container-fluid contenido">
        <div class="row justify-content-center">
            <div class="col-2">
                <div class="row flex-column menu">
                    <a href="{{route('administradorDashboard')}}">Dashboard</a>
                    <a href="{{route('administradorContactos')}}">Contactos</a>
                </div>
            </div>
            <div class="col-10 separdor-vertical">
                {{$contenido}}
            </div>
        </div>
    </div>
</section>
