<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Admin Panel</h1>
                <p class="text-gray-300 text-sm">Portfolio Management</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 border-r-4 border-indigo-500' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                </a>
                
                <!-- 🎯 TAMBAH MENU EDIT PROFIL DI SINI -->
                <a href="{{ route('profile.edit') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('profile.*') ? 'bg-gray-700 border-r-4 border-indigo-500' : '' }}">
                    <i class="fas fa-user-edit mr-3"></i>Edit Profil
                </a>
                
                <a href="{{ route('admin.experiences.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('admin.experiences.*') ? 'bg-gray-700 border-r-4 border-indigo-500' : '' }}">
                    <i class="fas fa-briefcase mr-3"></i>Pengalaman
                </a>
                <a href="{{ route('admin.educations.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('admin.educations.*') ? 'bg-gray-700 border-r-4 border-indigo-500' : '' }}">
                    <i class="fas fa-graduation-cap mr-3"></i>Pendidikan
                </a>
                <a href="{{ route('admin.skills.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('admin.skills.*') ? 'bg-gray-700 border-r-4 border-indigo-500' : '' }}">
                    <i class="fas fa-code mr-3"></i>Skills
                </a>
                <a href="{{ route('admin.projects.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700 {{ request()->routeIs('admin.projects.*') ? 'bg-gray-700 border-r-4 border-indigo-500' : '' }}">
                    <i class="fas fa-project-diagram mr-3"></i>Proyek
                </a>
                
                <div class="border-t border-gray-700 mt-4 pt-4">
                    <a href="{{ url('/') }}" target="_blank" class="block py-3 px-4 text-gray-100 hover:bg-gray-700">
                        <i class="fas fa-eye mr-3"></i>Lihat Portfolio
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left py-3 px-4 text-gray-100 hover:bg-gray-700">
                            <i class="fas fa-sign-out-alt mr-3"></i>Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <div class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('form[action*="destroy"]');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>