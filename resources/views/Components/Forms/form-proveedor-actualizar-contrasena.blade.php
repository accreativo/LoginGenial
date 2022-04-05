<form action="{{$formAction}}"
    class="needs-validation" method="post">
    @csrf
    <div class="form-row justify-content-start">
        <div class="form-group col-md-12 px-md-4">
            <label for="password">Nueva contraseña</label>
            <input type="password" class="form-control"
                name="password" id="password"
                minlength="6"
                placeholder="Nueva contraseña">
        </div>
        <div class="form-group col-md-12 px-md-4">
            <label for="repassword">Repite tu contraseña</label>
            <input type="password" class="form-control"
                name="repassword" id="repassword"
                minlength="6"
                placeholder="Repirte tu contrseña">
        </div>
        <div class="form-group col-8 col-xl-7 px-md-4">
            <button class="btn btn-orange fs2 px-5" type="submit">Actualizar</button>
        </div>
    </div>
</form>
