<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Portfolio</title>
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
                <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700 bg-gray-700 border-r-4 border-indigo-500">
                    <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
                </a>
                <a href="{{ route('admin.experiences.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700">
                    <i class="fas fa-briefcase mr-3"></i>Pengalaman
                </a>
                <a href="{{ route('admin.educations.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700">
                    <i class="fas fa-graduation-cap mr-3"></i>Pendidikan
                </a>
                <a href="{{ route('admin.skills.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700">
                    <i class="fas fa-code mr-3"></i>Skills
                </a>
                <a href="{{ route('admin.projects.index') }}" class="block py-3 px-4 text-gray-100 hover:bg-gray-700">
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

                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
                    <p class="text-gray-600 mt-2">Selamat datang di panel admin portfolio</p>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-indigo-500">
                        <div class="flex items-center">
                            <div class="p-3 bg-indigo-100 rounded-lg">
                                <i class="fas fa-briefcase text-indigo-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $experienceCount ?? 0 }}</h3>
                                <p class="text-gray-600">Pengalaman</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.experiences.index') }}" class="block mt-4 text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                            Kelola →
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-100 rounded-lg">
                                <i class="fas fa-graduation-cap text-green-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $educationCount ?? 0 }}</h3>
                                <p class="text-gray-600">Pendidikan</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.educations.index') }}" class="block mt-4 text-green-600 hover:text-green-800 text-sm font-medium">
                            Kelola →
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-lg">
                                <i class="fas fa-code text-blue-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $skillCount ?? 0 }}</h3>
                                <p class="text-gray-600">Skills</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.skills.index') }}" class="block mt-4 text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Kelola →
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-purple-500">
                        <div class="flex items-center">
                            <div class="p-3 bg-purple-100 rounded-lg">
                                <i class="fas fa-project-diagram text-purple-600 text-xl"></i>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-2xl font-bold text-gray-800">{{ $projectCount ?? 0 }}</h3>
                                <p class="text-gray-600">Proyek</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.projects.index') }}" class="block mt-4 text-purple-600 hover:text-purple-800 text-sm font-medium">
                            Kelola →
                        </a>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <a href="{{ route('admin.experiences.create') }}" class="bg-indigo-600 text-white px-4 py-3 rounded-lg text-center hover:bg-indigo-700 transition flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Pengalaman
                        </a>
                        <a href="{{ route('admin.educations.create') }}" class="bg-green-600 text-white px-4 py-3 rounded-lg text-center hover:bg-green-700 transition flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Pendidikan
                        </a>
                        <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 text-white px-4 py-3 rounded-lg text-center hover:bg-blue-700 transition flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Skill
                        </a>
                        <a href="{{ route('admin.projects.create') }}" class="bg-purple-600 text-white px-4 py-3 rounded-lg text-center hover:bg-purple-700 transition flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i>Tambah Proyek
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Panduan Cepat</h2>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                            <div>
                                <p class="font-medium">Tambah pengalaman kerja terbaru Anda</p>
                                <p class="text-gray-600 text-sm">Isi posisi, perusahaan, dan deskripsi pekerjaan</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                            <div>
                                <p class="font-medium">Update skills dan kemampuan</p>
                                <p class="text-gray-600 text-sm">Kategorikan skills dan tentukan level kemahiran</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                            <div>
                                <p class="font-medium">Tampilkan proyek terbaik Anda</p>
                                <p class="text-gray-600 text-sm">Upload gambar dan tambahkan link demo/github</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Simple confirmation for delete actions
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