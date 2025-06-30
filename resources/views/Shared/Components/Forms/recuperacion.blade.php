<form action="#" method="post">
    @csrf
    <div class="row row-gap-3">
        <div class="col-12">
            <h3>Recuperación de contraseña</h3>
            <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</small>
        </div>
        <div class="col-12">
            <div class="row row-gap-3">
                <div class="col-12">
                    @component('Shared.Components.Forms.input', [
                        'type' => 'email',
                        'id' => 'correo',
                        'label' => 'Correo Electrónico',
                        'name' => 'correo',
                        'placeholder' => 'Ingresa tu correo de registro',
                        'isRequired' => true
                    ]) @endcomponent
                </div>
                <div class="col-12">
                    <div class="row row-gap-2">
                        <div class="col-12">
                            @component('Shared.Components.Buttons.submit', [
                                'class' => 'btn-submit',
                                'text' => 'Enviar Instrucciones',
                            ]) @endcomponent
                        </div>
                        <div class="col-12">
                            ¿Recordaste tu contrseña?
                            <a class="link-word" href="{{route('autenticacionViewLogin')}}">
                                Inicia sesión aquí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
