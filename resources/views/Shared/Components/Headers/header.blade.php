<section class="container-fluid">
    <div class="position-relative d-md-none">
        <div class="background-modal" style="display: none;"></div>
        {{-- @component('Components.Menu.socio') @endcomponent --}}
    </div>
    <div class="row row-gap-3">
        <div class="col-12">
            <div class="row justify-content-end">
                {{-- <div class="col-3 col-sm-5 col-md-6 col-lg-4 col-xl-6 col-xxxl-6 my-auto">
                    <div class="d-flex align-items-center">
                        <a href="#dashboard">
                            <img src="{{asset('img/logos/login.png')}}" style="width: 3rem;" alt="">
                        </a>
                    </div>
                </div> --}}
                <div class="col-7 col-sm-7 col-md-6 col-lg-8 col-xl-7 col-xxxl-7 my-auto">
                    <div class="row align-items-center justify-content-end">
                        <div class="col-12">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <a target="_blank"  class="btn-header btn-transparent"
                                href="#link-soporte">
                                    <i class="fab fa-whatsapp me-0 me-lg-2"></i>
                                    <span class="d-none d-lg-block">Soporte</span>
                                </a>

                                <a target="_blank"  class="btn-header btn-transparent"
                                href="#nuevo-registro">
                                    <i class="fas fa-user-plus me-0 me-lg-2"></i>
                                    <span class="d-none d-lg-block">Registrar</span>
                                </a>

                                <a id="btn-link-cliente" role="button" class="btn-header btn-transparent"
                                onclick="copiar_link('#btn-link-cliente')"
                                data-clipboard-text="#link">
                                    <i class="fa-solid fa-share-nodes me-0 me-lg-2"></i>
                                    <span class="d-none d-lg-block">Link Afiliación</span>
                                </a>

                                <div class="d-flex align-items-center">
                                    <span class="d-none d-sm-block fw-bold text-end">Código <br> 99999999</span>
                                    <div class="box-user-foto d-none d-sm-flex align-items-center ps-3">
                                        <img src="{{asset('img/perfiles/sin-foto.png')}}" style="width: 2rem;" alt="">
                                    </div>

                                    <button style="background: transparent;" class="p-0 btn d-md-none">
                                        <i class="fa-solid fa-bars text-light me-0" style="font-size: 1.5rem;"></i>
                                    </button>
                                    <div class="d-none d-md-block dropdown ps-3">
                                        <a href="#" class="dropdown-toggle" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#perfil">Perfil</a></li>
                                            <li>
                                                <form action="#cerrar-sesion" id="logoutForm" method="post" class="">@csrf</form>
                                                <button class="dropdown-item" role="button" onclick="cerrarSesion()">Cerrar Sesión</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-12">
            @component('Shared.Components.Headers.menu') @endcomponent
        </div> --}}
    </div>
</section>
