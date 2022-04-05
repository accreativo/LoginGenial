<div class="col-md-6 col-lg-6 col-xl-5 px-3 py-3 p-sm-3 p-lg-5">
    <div class="card-proveedor row mx-0">
        <div class="col col-4">
            <div class="h-100 w-100">
                <div class="d-flex h-100 align-content-center justify-content-center">
                    <a href="{{$ficha->link}}">
                        <img src="{{$ficha->logo}}"
                            alt="" class="img-fluid py-5 px-2">
                    </a>
                </div>
            </div>
        </div>
        <div class="col col-8">
            <div class="row align-items-center h-100 proveedor-contenido">
                <div class="col-12">
                    <a href="{{$ficha->link}}">
                        <h3 class="color-orange mb-3 mb-lg-5">{{$ficha->nombre}}</h3>
                    </a>
                    <p class="fs2 mb-0">
                        {{$ficha->descripcion}}
                    </p>
                    <div class="link-proveedor bg-orange">
                        <a href="{{$ficha->link}}">+</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
