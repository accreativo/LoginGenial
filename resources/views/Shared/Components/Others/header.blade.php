<header>
    <section class="cintillo px-md-5">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <span class="text-right"><a href="https://www.infocapitalhumano.pe/" target="_blank">Info Capital Humano</a> | <a href="https://www.expocapitalhumano.com/" target="_blank">Expo Capital Humano</a></span>
                </div>
            </div>
        </div>
    </section>
    <nav class="navbar navbar-expand-lg py-4 px-md-5">
        <div class="container-fluid px-md-5">
            <a class="navbar-brand" href="{{$routeHome}}">
                <img src="{{asset('img/logos/logo-home.svg')}}" class="d-inline-block align-text-top">
            </a>
            <div class="d-lg-none d-flex">
                <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if ($routeHome)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$routeHome}}">Home</a>
                        </li>
                    @endif
                    @if ($routeRubros)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$routeRubros}}">Rubros</a>
                        </li>
                    @endif
                    @if ($routeRegistro)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$routeRegistro}}">Registro</a>
                        </li>
                    @endif
                    @if ($routePublicidad)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$routePublicidad}}">Publicidad</a>
                        </li>
                    @endif
                    @if ($routeMiCuenta)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$routeMiCuenta}}">Mi cuenta</a>
                        </li>
                    @endif
                    @if ($routeContacto)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$routeContacto}}">Contacto</a>
                        </li>
                    @endif
                    @if ($routeCerrarSesion??'')
                        <li class="nav-item">
                            <form action="{{$routeCerrarSesion}}" method="post" id="form-logout">
                                @csrf
                                <button type="submit" class="nav-link" style=" background-color: transparent;border: none;">Cerrar Sesión</button>
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
