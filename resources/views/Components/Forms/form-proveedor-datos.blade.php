<form action="{{$formAction}}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6 px-md-4">
            <label for="nombres">Nombres</label>
            <input type="text" class="form-control"
                id="nombres" name="nombres"
                value="{{($proveedor??null)?$proveedor->nombres:old('nombres')}}"
                placeholder="Nombres" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6 px-md-4">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="form-control"
                id="apellidos" name="apellidos"
                value="{{($proveedor??null)?$proveedor->apellidos:old('apellidos')}}"
                placeholder="Apellidos" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6 px-md-4">
            <label for="correo">Correo</label>
            <input type="email" class="form-control"
                id="correo" name="correo"
                value="{{($proveedor??null)?$proveedor->usuario->correo:old('correo')}}"
                placeholder="Correo" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6 px-md-4">
            <label for="celular">Celular</label>
            <input type="tel" class="form-control"
                id="celular" name="celular"
                value="{{($proveedor??null)?$proveedor->celular:old('celular')}}"
                minlength="7" maxlength="9"
                placeholder="999999999" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6 px-md-4">
            <label for="ruc">Ruc</label>
            <input type="text" class="form-control"
                id="ruc" name="ruc"
                value="{{($proveedor??null)?$proveedor->ruc:old('ruc')}}"
                minlength="11" maxlength="11"
                placeholder="99999999999" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6 px-md-4">
            <label for="razon_social">Nombre Comercial</label>
            <input type="text" class="form-control"
                id="razon_social" name="razon_social"
                value="{{($proveedor??null)?$proveedor->razon_social:old('razon_social')}}"
                placeholder="Nombre comercial" autocomplete="off" required>
        </div>
        <div class="form-group col-md-6 px-md-4">
            <label for="descripcion">Descripcion</label>
            <textarea cols="30" rows="5" class="form-control"
                id="descripcion" name="descripcion"
                placeholder="Descripción" autocomplete="off" required>{{($proveedor??null)?$proveedor->descripcion:old('descripcion')}}</textarea>
        </div>
        <div class="form-row col-md-6 px-md-4">
            <div class="form-group col-12">
                <label for="web">Direccion Web</label>
                <input type="url" class="form-control"
                    id="web" name="web"
                    value="{{($proveedor??null)?$proveedor->web:old('web')}}"
                    placeholder="https://www.ejemplo.com" autocomplete="off" required>
            </div>
        </div>
        @if ($proveedor??null)
            <div class="form-group col-md-12 px-md-4 text-left">
                <button class="btn btn-violet fs2 px-5" type="submit">Actualizar</button>
            </div>
        @else
            <div class="form-group col-md-12 px-md-4 mt-2 mb-5">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input"
                        id="terminos" name="terminos" value="1" required>
                    <label class="custom-control-label fs2 text-dark" for="terminos">He leído y estoy de acuerdo con los <a href="#">términos y condiciones</a>.</label>
                </div>
            </div>
            <div class="form-group col-md-12 text-center">
                <button class="btn btn-violet fs3 px-5" type="submit">Registrar</button>
            </div>
            <div class="form-group col-md-12 text-center">
                <a class="color-gray" href="{{route('webPublicidad')}}">Quiero ver los planes</a>
            </div>
        @endif
    </div>
</form>
