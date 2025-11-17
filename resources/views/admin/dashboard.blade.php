@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard Admin</h1>
    <p class="text-gray-600 mt-2">Selamat datang di panel admin portfolio</p>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- ... existing stat cards ... -->
</div>

<!-- TAMBAH PROFIL QUICK ACTION -->
<div class="bg-white p-6 rounded-lg shadow mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Kelola Profil</h2>
    <div class="flex items-center justify-between">
        <div>
            <h3 class="text-lg font-medium text-gray-900">{{ Auth::user()->name }}</h3>
            <p class="text-gray-600">{{ Auth::user()->professional_title ?? 'Tidak ada judul profesional' }}</p>
            <p class="text-sm text-gray-500 mt-1">{{ Auth::user()->email }}</p>
        </div>
        <div class="space-x-3">
            <a href="{{ route('profile.edit') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                <i class="fas fa-edit mr-2"></i>Edit Profil
            </a>
            <a href="{{ url('/') }}" target="_blank" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-eye mr-2"></i>Lihat Portfolio
            </a>
        </div>
    </div>
    
    <!-- Profil Status -->
    <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
        <div class="text-center p-3 bg-blue-50 rounded-lg">
            <div class="text-blue-600 font-semibold">{{ $experienceCount ?? 0 }}</div>
            <div class="text-gray-600">Pengalaman</div>
        </div>
        <div class="text-center p-3 bg-green-50 rounded-lg">
            <div class="text-green-600 font-semibold">{{ $educationCount ?? 0 }}</div>
            <div class="text-gray-600">Pendidikan</div>
        </div>
        <div class="text-center p-3 bg-purple-50 rounded-lg">
            <div class="text-purple-600 font-semibold">{{ $skillCount ?? 0 }}</div>
            <div class="text-gray-600">Skills</div>
        </div>
        <div class="text-center p-3 bg-orange-50 rounded-lg">
            <div class="text-orange-600 font-semibold">{{ $projectCount ?? 0 }}</div>
            <div class="text-gray-600">Proyek</div>
        </div>
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
@endsection