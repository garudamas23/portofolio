<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', ($user->name ?? config('app.name', 'Laravel')))</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- FontAwesome & Tailwind -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased">
        <!-- SMART NAVIGATION - AUTO DETECT FRONTEND/BACKEND -->
        @if(request()->is('admin/*'))
            {{-- ADMIN LAYOUT --}}
            @include('admin.layout')
        @else
            {{-- FRONTEND LAYOUT --}}
            <nav class="bg-white shadow-sm border-b border-gray-100">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <!-- Logo -->
                        <div class="flex items-center">
                            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-900">
                                {{ $user->name ?? 'My Portfolio' }}
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:flex sm:items-center space-x-8">
                            <a href="#about" class="text-gray-600 hover:text-gray-900">Tentang</a>
                            <a href="#experience" class="text-gray-600 hover:text-gray-900">Pengalaman</a>
                            <a href="#projects" class="text-gray-600 hover:text-gray-900">Proyek</a>
                            <a href="#contact" class="text-gray-600 hover:text-gray-900">Kontak</a>
                            
                            <!-- Smart Admin/Login Link -->
                            @auth
                                <a href="{{ route('admin.dashboard') }}" 
                                   class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 ml-4">
                                    <i class="fas fa-cog mr-1"></i> Admin
                                </a>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="text-gray-600 hover:text-gray-900 ml-4">
                                    Login
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="min-h-screen bg-gray-50">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-8">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600">
                    <p>&copy; {{ date('Y') }} {{ $user->name ?? 'My Portfolio' }}</p>
                </div>
            </footer>
        @endif
    </body>
</html>