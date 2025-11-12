<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Simple Header -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-indigo-600">Admin Panel</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-tachometer-alt mr-1"></i> Dashboard
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                        <i class="fas fa-eye mr-1"></i> Lihat Portfolio
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">
                            <i class="fas fa-sign-out-alt mr-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Edit Profil</h1>
                <p class="text-gray-600 mt-2">Kelola informasi profil dan akun Anda</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Informasi Profil -->
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-4">Informasi Profil</h2>
                        
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Photo Upload -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                                    <div class="flex items-center space-x-6">
                                        <div class="shrink-0">
                                            <img id="preview-photo" class="h-24 w-24 object-cover rounded-full border-2 border-gray-300" 
                                                src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}" 
                                                alt="Current photo">
                                        </div>
                                        <label class="block">
                                            <span class="sr-only">Pilih foto profil</span>
                                            <input type="file" name="photo" id="photo" accept="image/*" 
                                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                        </label>
                                    </div>
                                </div>

                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="professional_title" class="block text-sm font-medium text-gray-700">Judul Profesional</label>
                                    <input type="text" name="professional_title" id="professional_title" 
                                        value="{{ old('professional_title', Auth::user()->professional_title) }}" placeholder="Contoh: Full Stack Developer"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="+62 812 3456 7890"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                                    <input type="text" name="location" id="location" value="{{ old('location', Auth::user()->location) }}" placeholder="Contoh: Jakarta, Indonesia"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio / Deskripsi Profesional</label>
                                    <textarea name="bio" id="bio" rows="4" placeholder="Ceritakan tentang diri Anda, keahlian, dan pengalaman..."
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('bio', Auth::user()->bio) }}</textarea>
                                    <p class="mt-1 text-sm text-gray-500">Deskripsi ini akan ditampilkan di halaman portfolio</p>
                                </div>

                                <div>
                                    <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                                    <input type="url" name="website" id="website" value="{{ old('website', Auth::user()->website) }}" placeholder="https://example.com"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="linkedin" class="block text-sm font-medium text-gray-700">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', Auth::user()->linkedin) }}" placeholder="https://linkedin.com/in/username"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="github" class="block text-sm font-medium text-gray-700">GitHub</label>
                                    <input type="url" name="github" id="github" value="{{ old('github', Auth::user()->github) }}" placeholder="https://github.com/username"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="twitter" class="block text-sm font-medium text-gray-700">Twitter</label>
                                    <input type="url" name="twitter" id="twitter" value="{{ old('twitter', Auth::user()->twitter) }}" placeholder="https://twitter.com/username"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition">
                                    Simpan Perubahan Profil
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Ubah Password -->
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-semibold mb-4">Ubah Password</h2>
                        
                        <form action="{{ route('profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini *</label>
                                    <input type="password" name="current_password" id="current_password" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru *</label>
                                    <input type="password" name="password" id="password" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru *</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-white p-6 rounded-lg shadow mt-6">
                        <h2 class="text-xl font-semibold mb-4">Statistik Profil</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Member sejak</span>
                                <span class="font-medium">{{ Auth::user()->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Terakhir update</span>
                                <span class="font-medium">{{ Auth::user()->updated_at->format('d M Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Role</span>
                                <span class="font-medium {{ Auth::user()->is_admin ? 'text-green-600' : 'text-blue-600' }}">
                                    {{ Auth::user()->is_admin ? 'Administrator' : 'User' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="bg-white p-6 rounded-lg shadow mt-6">
                        <h2 class="text-xl font-semibold mb-4">Quick Links</h2>
                        <div class="space-y-2">
                            <a href="{{ route('admin.dashboard') }}" class="block w-full text-left bg-indigo-50 text-indigo-700 px-4 py-2 rounded hover:bg-indigo-100 transition">
                                <i class="fas fa-tachometer-alt mr-2"></i> Kembali ke Dashboard
                            </a>
                            <a href="{{ url('/') }}" target="_blank" class="block w-full text-left bg-green-50 text-green-700 px-4 py-2 rounded hover:bg-green-100 transition">
                                <i class="fas fa-eye mr-2"></i> Lihat Portfolio
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Preview photo sebelum upload
        document.getElementById('photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview-photo').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>