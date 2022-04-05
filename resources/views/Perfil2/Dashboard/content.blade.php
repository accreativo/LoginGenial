<h1>Bienvenido Perfil1</h1>
<form action="{{route('publicoLogout')}}" method="POST">
    @csrf
    <button type="submit">Cerrar Sesion</button>
</form>
