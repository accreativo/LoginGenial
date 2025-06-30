@component('Shared.Components.Others.footer') @endcomponent

@if (session("status"))
    @component('Shared.Components.Modals.modal-status', [
        'status' => session('status')
    ]) @endcomponent
@endif

@if ($errors->all())
    @component('Shared.Components.Modals.modal-error', [
        'errors' => $errors->all()
    ]) @endcomponent
@endif


@include('Shared.Libraries.jquery')
@include('Shared.Libraries.bootstrap-js')

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

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>


<script>
    const colors = ["#4caf50", "#e91e63", "#2196f3", "#9c27b0", "#ff9800", "#6442fa"];
    let index = 0;
    let current = 0;

    const bg1 = document.getElementById("bg1");
    const bg2 = document.getElementById("bg2");

    setInterval(() => {
        const nextColor = colors[index % colors.length];
        const target = current === 0 ? bg2 : bg1;
        const base = current === 0 ? bg1 : bg2;

        // Set next gradient in hidden layer
        target.style.background = `linear-gradient(0, #fff 50%, ${nextColor} 150%)`;
        target.style.opacity = 1;
        base.style.opacity = 0;

        current = 1 - current; // alterna entre 0 y 1
        index++;
    }, 3000); // cambia cada 4 segundos
</script>
