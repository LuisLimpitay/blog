<nav class="bg-gray-800" x-data="{ open:false }">

    <style>
        .active {
            color: lightgray;
            background: #6366F1;
        }

    </style>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

            {{-- ////////// MOBILE MENU BOTON ////////////// --}}
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button x-on:click=" open=true "
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-expanded="false">
                    <!-- Icon when menu is closed. -->
                    <!--
                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            {{-- /////////// END MOBILE MENU BOTON //////////////// --}}


            {{-- ///////////LOGOTIPO Y MENU ////////////// --}}
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/" class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Worflow">
                    <img class="hidden lg:block h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                        alt="Workflow">
                </a>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

                        <a href="{{ route('home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium
              {{ request()->routeIs('home') ? 'active' : '' }}">Posts</a>
                        @auth
                            <a href="{{ route('admin.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium
    {{ request()->routeIs('admin.index') ? 'active' : '' }}">Posts Admin</a>
                        @endauth

                    </div>
                </div>
            </div>
            {{-- ///////////END LOGOTIPO Y MENU ////////////// --}}


            {{-- /////////MENU DERECHO ////////// --}}
            @auth

                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative" x-data="{open:false}">
                        <div>

                            <button x-on:click=" open=true "
                                class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                id="user-menu" aria-haspopup="true">
                                <span class="sr-only"></span>
                                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            </button>
                        </div>

                        <div x-show="open" x-on:click.away=" open=false "
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu">

                            <a href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Perfil</a>

                            {{-- SI EL USUARIO ES ADMIN --}}
                            @if (auth()->user())
                                <a href="{{ route('admin.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    role="menuitem">Administrador</a>

                            @endif

                            @if (auth()->user()->level == 2)
                                {{-- aca como parametro mando algo que parece raro pero es el ID del user
                                mi controlador lo recibe como {user} --}}
                                <a href="{{ route('customers.enrollments', auth()->user()->id) }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    Mis Inscripciones</a>
                            @endif

                            <hr>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" onclick="event.preventDefault();
                                                    this.closest('form').submit();">Cerrar Sesion
                                </a>
                            </form>
                        </div>

                    </div>
                    <!-- End Profile dropdown -->
                </div>

            @else
                <div>
                    <a href="{{ route('login') }}"
                        class="text-gray-300  hover:text-white hover:underline px-3 py-2 rounded-md text-sm font-medium">Iniciar
                        Sesion</a>
                    <a href="{{ route('register') }}"
                        class="text-white bg-green-400 lg:hover:bg-gray-100 hover:text-black px-3 py-2 rounded-md text-sm font-medium">Registrarse</a>

                </div>
            @endauth
            {{-- //////END MENU DERECHO ////////// --}}

        </div>
    </div>

    {{-- /////////// MENU MOVIL ////////////// --}}
    <div class="sm:hidden" x-show="open" x-on:click.away=" open=false ">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            <a href="{{ route('home') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium
        {{ request()->routeIs('home') ? 'active' : '' }}">Posts</a>



        </div>
    </div>
    {{-- /////////// END MENU MOVIL ////////////// --}}

</nav>
