<form action="{{route('autenticacionProcessCredencialLogin')}}" class="needs-validation" novalidate method="post">
    @csrf
    <div class="row row-gap-3">
        <div class="col-12">
            <h3>Registro</h3>
            <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</small>
        </div>
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12">
                    @component('Shared.Components.Forms.input', [
                        'type' => 'text',
                        'id' => 'usuario',
                        'label' => 'Usuario',
                        'name' => 'usuario',
                        'placeholder' => 'Ingresa tu usuario',
                        'isRequired' => true
                    ]) @endcomponent
                </div>
                <div class="col-12">
                    @component('Shared.Components.Forms.input', [
                        'type' => 'password',
                        'id' => 'password',
                        'label' => 'Contraseña',
                        'name' => 'password',
                        'placeholder' => 'Ingresa tu constraseña',
                        'isRequired' => true
                    ]) @endcomponent
                </div>
                <div class="col-12">
                    <div class="row row-gap-2">
                        <div class="col-12">
                            @component('Shared.Components.Buttons.submit', [
                                'class' => 'btn-submit',
                                'text' => 'Iniciar Sesión',
                            ]) @endcomponent
                        </div>
                        <div class="col-12">
                            ¿Ya estás registrado?
                            <a class="link-word" href="{{route('autenticacionViewRecuperacion')}}">
                                Inicia sesión aquí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
