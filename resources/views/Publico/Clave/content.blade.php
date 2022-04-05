<form action="{{route('recuperar')}}" method="post">
    @csrf
    <input type="text" name="correo" id="correo" placeholder="Ingresa tu correo electrónico registrado">
    <button type="submit">Ingresar</button>
</form>