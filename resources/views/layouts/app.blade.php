@include('splashscreen')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data
    :class="{'theme-dark': $store.common.dark}">
<head>
    @include('layouts.head')

    @livewireStyles

    <script src='/js/lazysizes.min.js' defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div
        class="min-h-screen bg-gradient-to-r from-gray-300 to-gray-400 dark:from-gray-900 dark:to-gray-900 dark:text-gray-100">
        @livewire('navigation-dropdown')

            <div class='mt-16'>

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-indigo-600 dark:bg-indigo-800 text-white font-semibold shadow mb-5">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <div class='flex flex-col justify-between min-h-screen'>
                    <main class='sm:p-2 md:p-3'>
                        {{ $slot ?? '' }}
                        @yield('content', '')

                        <x-toast></x-toast>
                    </main>
                    @include('footer')
                </div>
            </div>
    </div>

    @stack('modals')

    @livewireScripts

    @stack('scripts')        
</body>

</html>
