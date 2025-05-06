<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Assurez-vous d'inclure Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a class="text-xl font-bold text-gray-800" href="#">Admin Panel</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#" class="px-3 py-2 rounded-md text-sm font-medium bg-gray-200 text-gray-900">Dashboard</a>
                        <a href="{{route('admin.users')}}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Users</a>
                        <a href="{{route('admin.events')}}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Events</a>
                        <a href="{{route('admin.categories')}}" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Categories</a>
                        <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Settings</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium bg-gray-200 text-gray-900">Dashboard</a>
                <a href="{{route('admin.users')}}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Users</a>
                <a href="{{route('admin.events')}}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Events</a>
                <a href="{{route('admin.categories')}}" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Categories</a>
                <a href="#" class="block px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 hover:text-gray-900">Settings</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Script simple pour gérer le menu mobile
        document.querySelector('button[aria-controls="mobile-menu"]').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const expanded = this.getAttribute('aria-expanded') === 'true';
            
            this.setAttribute('aria-expanded', !expanded);
            menu.classList.toggle('hidden');
            
            const icons = this.querySelectorAll('svg');
            icons.forEach(icon => icon.classList.toggle('hidden'));
        });
    </script>
</body>
</html>