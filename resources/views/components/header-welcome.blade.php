<header class="bg-indigo-600 grid grid-cols-2 items-center gap-2 py-2 lg:grid-cols-3  px-10">
    <div class="flex lg:justify-center lg:col-start-2">
       <!-- Logo -->
       
        <a href="{{ auth()->check() ? route('inmuebles.index', auth()->user()->username) : route('home') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    
     
    </div>
    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a
                    href="{{ route('inmuebles.index') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-hidden focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Mis Propiedades
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-hidden focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    Inicia Sesión
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-hidden focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Crear Cuenta
                    </a>
                @endif
            @endauth
        </nav>
    @endif

</header>
