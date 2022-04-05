@component('Components.Others.footer') @endcomponent

@if (session("status"))
    @component('Components.Modals.modal-status', [
        'status' => session('status')
    ]) @endcomponent
@endif

@if ($errors->all())
    @component('Components.Modals.modal-error', [
        'errors' => $errors->all()
    ]) @endcomponent
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

@if (session("status"))
    <script>
        $('#statusModal').modal('show')
    </script>
@endif
@if ($errors->all())
    <script>
        $('#errorModal').modal('show')
    </script>
@endif
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    $('button:submit').removeAttr('disabled');
                }
                form.classList.add('was-validated');
                }, false);
            });
        }, false);

        $('form').on('submit', function(event) {
            $('button:submit').attr('disabled', 'true');
        })

        $('.valnumero').on('input', function () {
            this.value = this.value.replace(/[^0-9]/g,'');
        });
        $('.valdecimal').on('input', function () {
            this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
        });

        $('.alphaonly').on('input', function (e) {
          if (!/^[ a-z0-9áéíóúüñ]*$/i.test(this.value)) {
            this.value = this.value.replace(/[^ a-z0-9áéíóúüñ]+/ig,"");
          }
        });

        $('.navbar-nav a').each(function(index) {
            if(this.href == window.location.href){
                $(this).addClass("nav-link-active");
            }

            if (`${this.href}/` == window.location.href) {
                $(this).addClass("nav-link-active");
            }

            if (`${this.href}-cliente` == window.location.href) {
                $(this).addClass("nav-link-active");
            }

            if (`${this.href}-proveedor` == window.location.href) {
                $(this).addClass("nav-link-active");
            }
        });

        setTimeout(() => {
            $('.preload').hide();
        }, 700);
    })();
</script>
