<form action="{{$formAction}}" method="POST" class="needs-validation">
    @csrf
    <div class="form-row justify-content-center">
        <div class="form-group col-md-12">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="form-group col-md-12 mb-4">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group col-8 col-xl-7">
            <button class="btn btn-block btn-violet fs3" type="submit">Ingresar</button>
        </div>
    </div>
</form>
