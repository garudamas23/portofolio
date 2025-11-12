@extends('layouts.portfolio') {{-- GUNAKAN LAYOUT PORTFOLIO BARU --}}

@section('title', ($portfolioData['user']->name ?? 'My Portfolio') . ' - Portfolio')

@section('content')
    <!-- Hero Section -->
    <section id="about" class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold text-gray-900">{{ $portfolioData['user']->name ?? 'Your Name' }}</h1>
            <p class="text-xl text-gray-600 mt-4">{{ $portfolioData['user']->title ?? 'Full Stack Developer' }}</p>
            <p class="text-gray-500 mt-6 max-w-2xl mx-auto">
                {{ $portfolioData['user']->description ?? 'Portfolio description...' }}
            </p>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Pengalaman</h2>
            
            @if($portfolioData['experiences']->count() > 0)
            <div class="space-y-8">
                @foreach($portfolioData['experiences'] as $experience)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $experience->position }}</h3>
                    <p class="text-gray-600">{{ $experience->company }} | {{ $experience->start_date }} - {{ $experience->end_date ?? 'Present' }}</p>
                    <p class="text-gray-500 mt-2">{{ $experience->description }}</p>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <p class="text-gray-500">No experience added yet.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Proyek</h2>
            
            @if($portfolioData['projects']->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portfolioData['projects'] as $project)
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $project->name }}</h3>
                    <p class="text-gray-600 mt-2">{{ $project->description }}</p>
                    @if($project->link)
                    <a href="{{ $project->link }}" target="_blank" 
                       class="inline-block mt-4 text-blue-600 hover:text-blue-800 font-medium">
                        Lihat Proyek →
                    </a>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <p class="text-gray-500">No projects yet.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Kontak</h2>
            <div class="space-y-4 max-w-md mx-auto">
                @if($portfolioData['user']->email)
                <p class="text-gray-600">
                    <strong>Email:</strong> {{ $portfolioData['user']->email }}
                </p>
                @endif
                @if($portfolioData['user']->phone)
                <p class="text-gray-600">
                    <strong>Telepon:</strong> {{ $portfolioData['user']->phone }}
                </p>
                @endif
            </div>
        </div>
    </section>
@endsection