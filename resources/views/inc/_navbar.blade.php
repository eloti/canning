@guest

<nav class="sticky top-0 flex justify-center hidden">
    <a href="{{ route('home') }}" class="py-0.5">
        <img src="/images/Logo2RP greenback.jpg" class="h-10">
    </a>
    <button class="ml-auto p-2 text-white" id="ChangeToggle">
        <div id="navbar-hamburger" class="flex justify-center items-center">
            <i class="fas fa-bars"></i>
        </div>
        <div id="navbar-close" class="hidden flex justify-center items-center">
            <i class="fas fa-times"></i>
        </div>
    </button>
</nav>

@else


<nav class="bg-rental">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="py-0.5">
                <img src="/images/Logo2RP greenback.jpg" class="h-9" alt="rental logo">
            </a>
          </div>
          
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex items-center">
            <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4 font-rental items-center">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ route('home') }}" class=" {{ request()->routeIs('home') ? ' text-white' : '' }} rounded-md  px-3 py-2 text-md  text-gray-300 font-semibold hover:text-white">Inicio</a>
                    <a href="{{ route('clients.index') }}" class=" {{ request()->routeIs('clients.index') ? ' text-white' : '' }} rounded-md px-3 py-2 text-sm  text-gray-300 font-semibold hover:text-white">Clientes</a>
                    <a class="nav-link dropdown-toggle" style="padding: 0 0.75rem" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cotizaciones</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="{{ route('cotis.create') }}">Crear Cotización</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="{{ route('cotis.open_index') }}">Cotizaciones Abiertas</a></li>
                            <li><a class="dropdown-item" style="padding: 0.25rem 2rem 0.25rem 0.5rem" href="{{ route('cotis.closed_index') }}">Cotizaciones Cerradas</a></li>
                        </ul>                    
                    
                        <!-- <a href="#" class="rounded-md px-3 py-2 text-sm  text-gray-300 font-semibold hover:text-white">Projects</a>
                        <a href="#" class="rounded-md px-3 py-2 text-sm  text-gray-300 font-semibold hover:text-white">Calendar</a>-->

                @if (Auth::user()->clearance === 1)
                   
                    <a href="{{ route('admin.panel') }}" class="rounded-md px-3 py-2 text-sm text-gray-300 font-semibold hover:text-white">Admin</a>

                    <ul class="dropdown-menu absolute hidden bg-white text-gray-800">
                        <li><a href="/admin" class="block py-2 px-4">Admin</a></li>
                        <li><a href="{{ route('register') }}" class="block py-2 px-4">Registrar Usuario <i class="fas fa-user-plus"></i></a></li>
                    </ul>
    
                @endif
                  <div>
                   
                    <div>
                        <button type="button" 
                                class="relative flex rounded-full  text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-1 focus:ring-offset-gray-800" 
                                id="user-menu-button" 
                                aria-expanded="false" 
                                aria-haspopup="true"
                                onclick="toggleDropdown()">
                            <!--<span class="absolute -inset-1.5"></span>-->
                            <span class="sr-only">Open user menu</span>
                            <a href="#" class="block py-2 px-3 text-white dropdown-toggle"><i class="fas fa-user"></i></a>
                        </button>
                    </div>
                    
                    <!-- Profile dropdown -->
                    <div id="dropdown-menu" 
                         class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" 
                         role="menu" 
                         aria-orientation="vertical" 
                         aria-labelledby="user-menu-button" 
                         tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="{{ route('user.show', ['id' => auth()->user()->id]) }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                       
                        <a id="logout" href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2"  onclick="">Salir

                        </a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                  </div>
              </div>
  
    <!-- Profile dropdown -->
           
            <!-- Profile dropdown -->
           
          </div>
        </div>
        <div class="-mr-2 flex sm:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!--
              Icon when menu is closed.
  
              Menu open: "hidden", Menu closed: "block"
            -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Icon when menu is open.
  
              Menu open: "block", Menu closed: "hidden"
            -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  




    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Dashboard</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
      </div>
      <div class="border-t border-gray-700 pb-3 pt-4">
        <div class="flex items-center px-5">
          <div class="flex-shrink-0">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </div>
          <div class="ml-3">
            <div class="text-base font-medium text-white">Tom Cook</div>
            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
          </div>
          <button type="button" class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
        </div>
      </div>
    </div>
  </nav>
  










<!--
<nav class="sticky top-0 bg-teal-900 flex justify-between items-center">
    <a href="{{ url('/') }}" class="py-0.5">
        <img src="/images/Logo2RP greenback.jpg" class="h-10">
    </a>
    <button class="ml-auto p-2 text-white" id="ChangeToggle">
        <div id="navbar-hamburger" class="flex justify-center items-center">
            <i class="fas fa-bars"></i>
        </div>
        <div id="navbar-close" class="hidden flex justify-center items-center">
            <i class="fas fa-times"></i>
        </div>
    </button>
    <div class="hidden w-full md:flex md:items-center md:w-auto" id="navbarCollapse">
        <ul class="flex flex-col md:flex-row md:ml-auto">
            @if(Auth::user()->clearance < 6)
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-white">Dashboard</a>
                </li>
                <li>
                    <a href="/clients" class="block py-2 px-3 text-white">Clientes</a>
                </li>
                Uncomment and adjust the dropdowns as needed
                <li class="relative">
                    <a href="#" class="block py-2 px-3 text-white dropdown-toggle">Cotizaciones</a>
                    <ul class="dropdown-menu absolute hidden bg-white text-gray-800">
                        <li><a href="#" class="block py-2 px-4">Crear Cotización</a></li>
                        <li><a href="#" class="block py-2 px-4">Cotizaciones Abiertas</a></li>
                        <li><a href="#" class="block py-2 px-4">Cotizaciones Cerradas</a></li>
                        <li><a href="/myOpenQuotes" class="block py-2 px-4">Mis Cotizaciones Abiertas</a></li>
                        <li><a href="/myClosedQuotes" class="block py-2 px-4">Mis Cotizaciones Cerradas</a></li>
                        <li><a href="/" class="block py-2 px-4">Reporte</a></li>
                    </ul>
                </li>
             
            @endif

            @if (Auth::user()->clearance === 1)
                <li class="relative">
                    <a href="#" class="block py-2 px-3 text-white dropdown-toggle">Admin</a>
                    <ul class="dropdown-menu absolute hidden bg-white text-gray-800">
                        <li><a href="/admin" class="block py-2 px-4">Admin</a></li>
                        <li><a href="{{ route('register') }}" class="block py-2 px-4">Registrar Usuario <i class="fas fa-user-plus"></i></a></li>
                    </ul>
                </li>
            @endif

            <li class="relative">
                <a href="#" class="block py-2 px-3 text-white dropdown-toggle"><i class="fas fa-user"></i>{{ Auth::user()->alias }}</a>
                <ul class="dropdown-menu absolute hidden bg-white text-gray-800">
                    <li><a href="{{ route('logout') }}" class="block py-2 px-4"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir <i class="fas fa-sign-out-alt"></i></a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                    <li><a href="/user/{{auth()->user()->id}}" class="block py-2 px-4">Perfil <i class="fas fa-address-card"></i></a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>-->

@endguest





<script>
function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    if (dropdownMenu.classList.contains("hidden")) {
        dropdownMenu.classList.remove("hidden");
    } else {
        dropdownMenu.classList.add("hidden");
    }
}


let logout = document.querySelector("#logout")


logout.addEventListener('click', function (){
    let form = document.getElementById("logout-form");
    console.log(form)
    document.getElementById("logout-form").submit();
})
</script>


