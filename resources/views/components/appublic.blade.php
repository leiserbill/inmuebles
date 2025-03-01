<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head-publico></x-head-publico>

<body class=" font-sans antialiased dark:bg-black dark:text-white/50">
    <x-header-welcome></x-header-welcome>
    <div class="bg-gray-50 min-h-screen text-black/50 dark:bg-black dark:text-white/50">
                
        <livewire:filtrar-inmuebles/>
      

        <!-- Page Content -->
        <main class="mx-auto mt-0 container px-2 ">

            {{ $slot }}

            <livewire:cookie-component/>
        </main>

    </div>

    <x-footer/>


    @livewireScripts
    @stack('scripts')
</body>

</html>
