@component('Components.Modals.modal', [
    'modal_id' => 'configurarFichaModal',
    'modal_titulo' => 'Configurar Ficha',
])
    @slot('modal_body')
        <form action="{{$formRoute}}" class="needs-validation" method="post" novalidate>
            @csrf
            <div class="form-row p-2">
                <div class="form-group col-12">
                    <label for="rubro">Rubro</label>
                    <select class="form-control" id="rubro" name="tkn_rubro" onchange="setSubRubros(this.value)" required>
                        <option value="">Seleccionar</option>
                        @foreach ($rubros as $item)
                            <option value="{{$item->tkn}}">{{$item->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-12 selector-subrubros">

                </div>
            </div>
        </form>
    @endslot
@endcomponent

<script>
    (function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    })()

    function setSubRubros(tknRubro){
        $.ajax({
            type:'POST',
            url:"{{ $ajaxRoute }}",
            data:{ tkn_rubro: tknRubro },
            beforeSend:function(){
                $('.preload').show();
            },
            success:function(data){
                if (data.subrubros.length > 0) {
                    cmb1 = "<option value=''> Selecciona un rubro </option>"
                    for (var i = 0; i < data.subrubros.length; i++) {
                        cmb1 += `<option value='${data.subrubros[i].tkn}'>${data.subrubros[i].nombre}</option>`
                    }
                    $('#subrubro').html(cmb1);
                }
            },
            error: function(errors){
                console.log(errors);
                // let errores = errors.responseJSON.errors;
                // let msg = '';
                // for (const property in errores) {
                //     msg += `${errores[property]} <br>`;
                // }
                // $('#colocacionError').modal('show');
                // $('#erroresColocacionModal').html(msg);
            },
            complete:function(){
                $('.preload').hide();
            },
        });
    }

</script>
