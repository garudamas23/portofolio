<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $portfolioData['user']->name ?? 'My Portfolio' }} - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Simple Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-gray-900">
                        {{ $portfolioData['user']->name ?? 'My Portfolio' }}
                    </a>
                </div>
                <div class="hidden sm:flex sm:items-center space-x-8">
                    <a href="#about" class="text-gray-600 hover:text-gray-900">Tentang</a>
                    <a href="#experience" class="text-gray-600 hover:text-gray-900">Pengalaman</a>
                    <a href="#skills" class="text-gray-600 hover:text-gray-900">Skills</a>
                    <a href="#projects" class="text-gray-600 hover:text-gray-900">Proyek</a>
                    <a href="#contact" class="text-gray-600 hover:text-gray-900">Kontak</a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
                            <i class="fas fa-cog mr-1"></i> Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="about" class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            @if($portfolioData['user']->photo)
                <img src="{{ asset('storage/' . $portfolioData['user']->photo) }}" 
                     alt="{{ $portfolioData['user']->name }}" 
                     class="w-32 h-32 rounded-full mx-auto mb-6 object-cover">
            @endif
            <h1 class="text-4xl font-bold text-gray-900">{{ $portfolioData['user']->name ?? 'Your Name' }}</h1>
            <p class="text-xl text-gray-600 mt-4">{{ $portfolioData['user']->professional_title ?? 'Professional Title' }}</p>
            <p class="text-gray-500 mt-6 max-w-2xl mx-auto leading-relaxed">
                {{ $portfolioData['user']->bio ?? 'Portfolio description...' }}
            </p>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Pengalaman Kerja</h2>
            
            @if($portfolioData['experiences']->count() > 0)
            <div class="space-y-8">
                @foreach($portfolioData['experiences'] as $experience)
                <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">{{ $experience->title }}</h3>
                            <p class="text-gray-600 font-medium">{{ $experience->company }}</p>
                        </div>
                        <p class="text-gray-500 text-sm">
                            {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                            {{ $experience->current ? 'Sekarang' : \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                        </p>
                    </div>
                    <p class="text-gray-500 mt-3 leading-relaxed">{{ $experience->description }}</p>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <p class="text-gray-500">Belum ada pengalaman kerja yang ditambahkan.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Skills & Kemampuan</h2>
            
            @if($portfolioData['skillCategories']->count() > 0)
                @foreach($portfolioData['skillCategories'] as $category => $skills)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6 capitalize border-b pb-2">
                        {{ str_replace('_', ' ', $category) }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($skills as $skill)
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    @if($skill->icon)
                                        <i class="fab fa-{{ $skill->icon }} text-blue-500 mr-3"></i>
                                    @endif
                                    <span class="font-medium text-gray-800">{{ $skill->name }}</span>
                                </div>
                                <span class="text-sm text-gray-600 bg-white px-2 py-1 rounded">{{ $skill->level }}/5</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" 
                                     style="width: {{ ($skill->level / 5) * 100 }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            @else
            <div class="text-center py-8">
                <p class="text-gray-500">Belum ada skills yang ditambahkan.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Proyek Terbaru</h2>
            
            @if($portfolioData['projects']->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portfolioData['projects'] as $project)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $project->title }}</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">{{ $project->description }}</p>
                        
                        @if($project->technologies)
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Teknologi:</h4>
                            <div class="flex flex-wrap gap-1">
                                @foreach(explode(',', $project->technologies) as $tech)
                                <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ trim($tech) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <div class="flex space-x-3 pt-4 border-t border-gray-100">
                            @if($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" 
                               class="flex-1 bg-blue-600 text-white text-center py-2 px-3 rounded text-sm hover:bg-blue-700 transition">
                                <i class="fas fa-external-link-alt mr-1"></i>Demo
                            </a>
                            @endif
                            @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" 
                               class="flex-1 bg-gray-600 text-white text-center py-2 px-3 rounded text-sm hover:bg-gray-700 transition">
                                <i class="fab fa-github mr-1"></i>Code
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <p class="text-gray-500">Belum ada proyek yang ditampilkan.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Hubungi Saya</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-2xl mx-auto">
                @if($portfolioData['user']->email)
                <div class="bg-gray-50 p-6 rounded-lg">
                    <i class="fas fa-envelope text-blue-500 text-2xl mb-3"></i>
                    <h3 class="font-semibold text-gray-800 mb-2">Email</h3>
                    <a href="mailto:{{ $portfolioData['user']->email }}" class="text-blue-600 hover:text-blue-800">
                        {{ $portfolioData['user']->email }}
                    </a>
                </div>
                @endif
                
                @if($portfolioData['user']->phone)
                <div class="bg-gray-50 p-6 rounded-lg">
                    <i class="fas fa-phone text-green-500 text-2xl mb-3"></i>
                    <h3 class="font-semibold text-gray-800 mb-2">Telepon</h3>
                    <a href="tel:{{ $portfolioData['user']->phone }}" class="text-green-600 hover:text-green-800">
                        {{ $portfolioData['user']->phone }}
                    </a>
                </div>
                @endif
                
                @if($portfolioData['user']->location)
                <div class="bg-gray-50 p-6 rounded-lg">
                    <i class="fas fa-map-marker-alt text-red-500 text-2xl mb-3"></i>
                    <h3 class="font-semibold text-gray-800 mb-2">Lokasi</h3>
                    <p class="text-gray-600">{{ $portfolioData['user']->location }}</p>
                </div>
                @endif
            </div>
            
            <!-- Social Links -->
            <div class="mt-12">
                <h3 class="text-xl font-semibold text-gray-800 mb-6">Temukan Saya di</h3>
                <div class="flex justify-center space-x-6">
                    @if($portfolioData['user']->website)
                    <a href="{{ $portfolioData['user']->website }}" target="_blank" 
                       class="text-gray-600 hover:text-blue-600 transition transform hover:scale-110">
                        <i class="fas fa-globe text-2xl"></i>
                    </a>
                    @endif
                    @if($portfolioData['user']->linkedin)
                    <a href="{{ $portfolioData['user']->linkedin }}" target="_blank" 
                       class="text-gray-600 hover:text-blue-700 transition transform hover:scale-110">
                        <i class="fab fa-linkedin text-2xl"></i>
                    </a>
                    @endif
                    @if($portfolioData['user']->github)
                    <a href="{{ $portfolioData['user']->github }}" target="_blank" 
                       class="text-gray-600 hover:text-gray-800 transition transform hover:scale-110">
                        <i class="fab fa-github text-2xl"></i>
                    </a>
                    @endif
                    @if($portfolioData['user']->twitter)
                    <a href="{{ $portfolioData['user']->twitter }}" target="_blank" 
                       class="text-gray-600 hover:text-blue-400 transition transform hover:scale-110">
                        <i class="fab fa-twitter text-2xl"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; {{ date('Y') }} {{ $portfolioData['user']->name ?? 'My Portfolio' }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Smooth Scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>