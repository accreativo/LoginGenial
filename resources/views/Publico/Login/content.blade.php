<h1>Esto un Login</h1>
<form action="{{route('publicoLogin')}}" method="post">
    @csrf
    <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu usuario">
    <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña">
    <button type="submit">Ingresar</button>
</form>
