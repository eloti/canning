@guest

    <nav class="navbar navbar-expand-md sticky-top" style="    display: flex;
    justify-content: center;">

        <a class="navbar-brand" style="padding-bottom: .1rem" href="{{ url('/') }}">
            <img src="/images/Logo2RP greenback.jpg" class="navbar-logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" id="ChangeToggle">

            <div id="navbar-hamburger">
                <span class="navbar-toggler-icon" style="color: white; display: flex; justify-content: center; align-items: center">
                    <i class="fas fa-bars"></i>
                </span>
            </div>

            <div class="hidden" id="navbar-close">
                <span class="navbar-toggler-icon" style="color: white; display: flex; justify-content: center; align-items: center">
                    <i class="fas fa-times"></i>
                </span>
            </div>

        </button>


    </nav>

@else

    <nav class="navbar navbar-expand-md sticky-top" style="background-color: rgb(0, 76, 84)">

        <a class="navbar-brand" style="padding-bottom: .1rem" href="{{ url('/') }}">
            <img src="/images/Logo2RP greenback.jpg" class="navbar-logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" id="ChangeToggle">

            <div id="navbar-hamburger">
                <span class="navbar-toggler-icon" style="color: white; display: flex; justify-content: center; align-items: center">
                    <i class="fas fa-bars"></i>
                </span>
            </div>

            <div class="hidden" id="navbar-close">
                <span class="navbar-toggler-icon" style="color: white; display: flex; justify-content: center; align-items: center">
                    <i class="fas fa-times"></i>
                </span>
            </div>

        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <ul class="navbar-nav ml-auto">

                @if(Auth::user()->clearance < 6)
                    <li class="nav-item">
                        <a class="navlink eagle" style="padding: 0 0.75rem" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="navlink eagle" style="padding: 0 0.75rem" href="/clients">Clientes</a>
                    </li>
                   <!-- <li class="nav-item dropdown">                    
                        <a class="nav-link dropdown-toggle" style="padding: 0 0.75rem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cotizaciones</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="">Crear Cotización</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="">Cotizaciones Abiertas</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="">Cotizaciones Cerradas</a></li>
                            li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="/myOpenQuotes">Mis Cotizaciones Abiertas</a></li
                            li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="/myClosedQuotes">Mis Cotizaciones Cerradas</a></li
                            <li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="/">Reporte</a></li>
                        </ul>                    
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="padding: 0 0.75rem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Unidades</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Parte</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">En Flota</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Vendidas</a></li>
                        </ul>
                    </li>
                   
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="padding: 0 0.75rem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alquileres</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Alquilar</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Un. Reservadas</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Alq. Vigentes</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Alq. Finalizados</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Alq. s/Facturar</a></li>
                        </ul>
                    </li>
                                  
                    <li class="nav-item dropdown">  
                        <a class="nav-link dropdown-toggle" style="padding: 0 0.75rem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">A&F</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li style="padding: 0.25rem 1.5rem 0.25rem 0.5rem; color: white"><b>ARGENTINA:</b></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Fact. Pendientes</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Fact. Cobradas</a></li>
                                <!--li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Ingresar Cob.</a></li
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Ventas</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Aging</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Cobranzas</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="/dolarnacion">Historial Precio Dolar Nación</a></li>
                                <hr>
                            <li style="padding: 0.25rem 1.5rem 0.25rem 0.5rem; color: white"><b>URUGUAY:</b></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Fact. Pendientes</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Fact. Cobradas</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Ventas</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Aging</a></li>
                                <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="">Cobranzas</a></li>
                        </ul> 
                    </li>-->
                @endif    


                @if (Auth::user()->clearance === 1)                
                    <li class="nav-item dropdown">                    
                        <a class="nav-link dropdown-toggle" style="padding: 0 0.75rem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="/admin">Admin</a></li>                
                            <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="{{ route('register') }}">Registrar Usuario <i class="fas fa-user-plus"></i></a></li>                    
                        </ul>                    
                    </li>
                @endif
                
                <li class="nav-item dropdown">                    
                    <a class="nav-link dropdown-toggle" style="padding: 0 0.75rem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>{{ Auth::user()->alias }} </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">                    
                        <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="{{ route('logout') }}" style="color: white; font-size: 0.8rem" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    >Salir <i class="fas fa-sign-out-alt"></i>
                        </a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <li><a class="dropdown-item" style="padding: 0.25rem 1.5rem 0.25rem 0.5rem" href="/user/{{auth()->user()->id}}" style="color: white; font-size: 0.8rem">Perfil <i class="fas fa-address-card"></i></a></li>
                    </ul>                    
                </li>
                
            </ul>
            
        </div>
        
    </nav>

@endguest

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var changeToggle = document.getElementById('ChangeToggle');
        var navbarHamburger = document.getElementById('navbar-hamburger');
        var navbarClose = document.getElementById('navbar-close');
        var navbarCollapse = document.getElementById('navbarCollapse');

        changeToggle.addEventListener('click', function() {
            navbarHamburger.classList.toggle('hidden');
            navbarClose.classList.toggle('hidden');
            navbarCollapse.classList.toggle('show');
        });

        // Obtener todos los elementos con la clase 'dropdown-toggle'
        var dropdownToggles = document.querySelectorAll('.dropdown-toggle');

        // Iterar sobre cada elemento 'dropdown-toggle'
        dropdownToggles.forEach(function(dropdownToggle) {
            // Agregar un event listener para el evento 'click' a cada 'dropdown-toggle'
            dropdownToggle.addEventListener('click', function(event) {
                // Obtener el menú desplegable asociado al 'dropdown-toggle' actual
                var dropdownMenu = this.nextElementSibling;

                // Cerrar todos los menús desplegables
                closeAllDropdowns();

                // Abrir el menú desplegable actual
                dropdownMenu.classList.toggle('show');

                // Detener la propagación del evento para evitar que el evento 'click' en el 'dropdown-toggle' también cierre el menú desplegable
                event.stopPropagation();
            });
        });

        // Función para cerrar todos los menús desplegables
        function closeAllDropdowns() {
            var dropdownMenus = document.querySelectorAll('.dropdown-menu');
            dropdownMenus.forEach(function(dropdownMenu) {
                dropdownMenu.classList.remove('show');
            });
        }

        // Agregar un event listener para el evento 'click' en el documento
        document.addEventListener('click', function(event) {
            // Cerrar todos los menús desplegables si se hace clic fuera de ellos
            closeAllDropdowns();
        });
    });
</script>

@endsection

