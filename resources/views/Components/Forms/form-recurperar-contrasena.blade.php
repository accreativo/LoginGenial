<form action="{{$formAction}}" method="POST" class="needs-validation">
    @csrf
    <div class="form-row justify-content-center">
        <div class="form-group col-md-12">
            <label for="correo">Correo Electrónico</label>
            <input type="text" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="form-group col-8 col-xl-7">
            <button class="btn btn-block btn-orange fs3" type="submit">Recuperar</button>
        </div>
    </div>
</form>
