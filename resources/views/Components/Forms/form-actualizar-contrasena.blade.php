<form action="{{$formAction}}"
    class="needs-validation" method="post">
    @csrf
    <div class="form-row justify-content-center">
        <div class="form-group col-md-12">
            <label for="password">Nueva contraseña</label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Nueva contraseña">
        </div>
        <div class="form-group col-md-12">
            <label for="repassword">Repite tu contraseña</label>
            <input type="text" class="form-control" name="repassword" id="repassword" placeholder="Repirte tu contrseña">
        </div>
        <div class="form-group col-8 col-xl-7">
            <button class="btn btn-block btn-orange fs3" type="submit">Actualizar</button>
        </div>
    </div>
</form>
