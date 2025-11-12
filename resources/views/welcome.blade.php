@extends('layouts.app')

@section('title', 'Portfolio - Muhammad Naufal Widiyantama')

@section('content')
    <!-- Header/Navbar -->
    <header class="fixed w-full bg-white shadow-sm z-10">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-indigo-600">Naufal</div>
            <div class="hidden md:flex space-x-8">
                <a href="#home" class="hover:text-indigo-600 transition">Home</a>
                <a href="#about" class="hover:text-indigo-600 transition">Tentang</a>
                <a href="#experience" class="hover:text-indigo-600 transition">Pengalaman</a>
                <a href="#education" class="hover:text-indigo-600 transition">Pendidikan</a>
                <a href="#skills" class="hover:text-indigo-600 transition">Skills</a>
                <a href="#projects" class="hover:text-indigo-600 transition">Proyek</a>
                <a href="#contact" class="hover:text-indigo-600 transition">Kontak</a>
                
                <!-- Authentication Links -->
                @auth
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600 transition">Admin Panel</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-indigo-600 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-indigo-600 transition">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="hover:text-indigo-600 transition">Register</a>
                    @endif
                @endauth
            </div>
            <a href="#contact" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Hubungi Saya
            </a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="pt-24 pb-16 md:pt-32 md:pb-24 bg-gradient-to-br from-indigo-50 to-white">
        <div class="container mx-auto px-6 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                @auth
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ Auth::user()->name }}</h1>
                    <h2 class="text-xl md:text-2xl text-indigo-600 mb-6">
                        {{ Auth::user()->professional_title ?? 'Full Stack Developer' }}
                    </h2>
                    <p class="text-gray-600 mb-8 max-w-lg">
                        {{ Auth::user()->bio ?? 'Saya adalah seorang Full Stack Developer dengan pengalaman dalam pengembangan aplikasi web menggunakan teknologi modern seperti Laravel, React, dan Vue.js.' }}
                    </p>
                @else
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Muhammad Naufal Widiyantama</h1>
                    <h2 class="text-xl md:text-2xl text-indigo-600 mb-6">Full Stack Developer</h2>
                    <p class="text-gray-600 mb-8 max-w-lg">
                        Saya adalah seorang Full Stack Developer dengan pengalaman dalam pengembangan aplikasi web menggunakan teknologi modern seperti Laravel, React, dan Vue.js.
                    </p>
                @endauth
                <div class="flex space-x-4">
                    <a href="#projects" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition">
                        Lihat Proyek
                    </a>
                    <a href="#contact" class="border border-indigo-600 text-indigo-600 px-6 py-3 rounded-lg hover:bg-indigo-50 transition">
                        Hubungi Saya
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="w-64 h-64 md:w-80 md:h-80 bg-indigo-100 rounded-full overflow-hidden border-4 border-white shadow-lg">
                    @auth
                        @if(Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-indigo-300 flex items-center justify-center text-white text-6xl">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                    @else
                        <div class="w-full h-full bg-indigo-300 flex items-center justify-center text-white text-6xl">
                            <i class="fas fa-user"></i>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Saya -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Tentang Saya</h2>
            <div class="max-w-3xl mx-auto text-lg text-gray-700 leading-relaxed">
                @auth
                    @if(Auth::user()->bio)
                        <p class="mb-6">{{ Auth::user()->bio }}</p>
                    @else
                        <p class="mb-6">
                            Saya adalah seorang Full Stack Developer yang bersemangat dalam menciptakan solusi digital yang inovatif dan efisien. Dengan latar belakang dalam pengembangan web, saya memiliki pengalaman dalam berbagai teknologi termasuk Laravel, React, Vue.js, dan banyak lagi.
                        </p>
                        <p class="mb-6">
                            Saya selalu berusaha untuk terus belajar dan mengembangkan keterampilan saya dalam teknologi terbaru. Saya percaya bahwa kombinasi antara kreativitas dan keterampilan teknis adalah kunci untuk menciptakan produk yang luar biasa.
                        </p>
                        <p>
                            Saat ini, saya fokus pada pengembangan aplikasi web yang skalabel dan responsif dengan pengalaman pengguna yang optimal.
                        </p>
                    @endif
                @else
                    <p class="mb-6">
                        Saya adalah seorang Full Stack Developer yang bersemangat dalam menciptakan solusi digital yang inovatif dan efisien. Dengan latar belakang dalam pengembangan web, saya memiliki pengalaman dalam berbagai teknologi termasuk Laravel, React, Vue.js, dan banyak lagi.
                    </p>
                    <p class="mb-6">
                        Saya selalu berusaha untuk terus belajar dan mengembangkan keterampilan saya dalam teknologi terbaru. Saya percaya bahwa kombinasi antara kreativitas dan keterampilan teknis adalah kunci untuk menciptakan produk yang luar biasa.
                    </p>
                    <p>
                        Saat ini, saya fokus pada pengembangan aplikasi web yang skalabel dan responsif dengan pengalaman pengguna yang optimal.
                    </p>
                @endauth
            </div>
        </div>
    </section>

    <!-- Pengalaman Kerja -->
    <section id="experience" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Pengalaman Kerja</h2>
            <div class="max-w-4xl mx-auto">
                @foreach($experiences as $experience)
                <div class="mb-10 relative pl-8 before:absolute before:left-0 before:top-2 before:w-4 before:h-4 before:bg-indigo-500 before:rounded-full before:z-10 after:absolute after:left-2 after:top-6 after:bottom-0 after:w-0.5 after:bg-indigo-200">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-xl font-semibold mb-1">{{ $experience->title }}</h3>
                        <p class="text-indigo-600 mb-2">{{ $experience->company }}</p>
                        <p class="text-gray-500 text-sm mb-4">
                            {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                            {{ $experience->current ? 'Sekarang' : \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                        </p>
                        <p class="text-gray-700">{{ $experience->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Pendidikan -->
    <section id="education" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Pendidikan</h2>
            <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-8">
                @foreach($educations as $education)
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <h3 class="text-xl font-semibold mb-1">{{ $education->degree }}</h3>
                    <p class="text-indigo-600 mb-2">{{ $education->institution }}</p>
                    <p class="text-gray-500 text-sm mb-4">
                        {{ $education->start_year }} - {{ $education->current ? 'Sekarang' : $education->end_year }}
                    </p>
                    <p class="text-gray-700">{{ $education->description }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Skills -->
    <section id="skills" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Skills</h2>
            <div class="max-w-4xl mx-auto">
                @foreach($skillCategories as $category => $skills)
                <div class="mb-10">
                    <h3 class="text-xl font-semibold mb-6 capitalize">{{ str_replace('_', ' ', $category) }}</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($skills as $skill)
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                            <div class="text-3xl text-indigo-500 mb-2">
                                @if($skill->icon)
                                    <i class="fab fa-{{ $skill->icon }}"></i>
                                @else
                                    <i class="fas fa-code"></i>
                                @endif
                            </div>
                            <h4 class="font-medium">{{ $skill->name }}</h4>
                            <div class="flex justify-center mt-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <div class="w-3 h-3 rounded-full mx-1 {{ $i <= $skill->level ? 'bg-indigo-500' : 'bg-gray-300' }}"></div>
                                @endfor
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Proyek -->
    <section id="projects" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Proyek</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <div class="h-48 bg-gray-200 flex items-center justify-center">
                        @if($project->image_url)
                        <img src="{{ $project->image_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        @else
                        <div class="text-gray-400 text-5xl">
                            <i class="fas fa-image"></i>
                        </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(explode(',', $project->technologies) as $tech)
                            <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                        <div class="flex space-x-3">
                            @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="text-indigo-600 hover:text-indigo-800">
                                <i class="fas fa-external-link-alt"></i> Live Demo
                            </a>
                            @endif
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="text-gray-600 hover:text-gray-800">
                                <i class="fab fa-github"></i> GitHub
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Kontak -->
    <section id="contact" class="py-16 bg-indigo-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-12 text-center">Kontak</h2>
            <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-xl font-semibold mb-6">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="text-indigo-600 mr-4 mt-1">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <p class="font-medium">Email</p>
                                <p class="text-gray-600">{{ Auth::user()->email ?? 'naufal@example.com' }}</p>
                            </div>
                        </div>
                        @auth
                            @if(Auth::user()->phone)
                            <div class="flex items-start">
                                <div class="text-indigo-600 mr-4 mt-1">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Telepon</p>
                                    <p class="text-gray-600">{{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                            @endif
                            @if(Auth::user()->location)
                            <div class="flex items-start">
                                <div class="text-indigo-600 mr-4 mt-1">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Lokasi</p>
                                    <p class="text-gray-600">{{ Auth::user()->location }}</p>
                                </div>
                            </div>
                            @endif
                        @endauth
                    </div>
                    <div class="mt-8">
                        <h4 class="font-semibold mb-4">Media Sosial</h4>
                        <div class="flex space-x-4">
                            @auth
                                @if(Auth::user()->linkedin)
                                <a href="{{ Auth::user()->linkedin }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-xl">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                @endif
                                @if(Auth::user()->github)
                                <a href="{{ Auth::user()->github }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-xl">
                                    <i class="fab fa-github"></i>
                                </a>
                                @endif
                                @if(Auth::user()->twitter)
                                <a href="{{ Auth::user()->twitter }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-xl">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                @endif
                                @if(Auth::user()->website)
                                <a href="{{ Auth::user()->website }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 text-xl">
                                    <i class="fas fa-globe"></i>
                                </a>
                                @endif
                            @else
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 text-xl">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 text-xl">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-800 text-xl">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-6">Kirim Pesan</h3>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 mb-2">Nama</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                        </div>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 transition w-full">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; {{ date('Y') }} Muhammad Naufal Widiyantama. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Smooth scroll untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
@endsection