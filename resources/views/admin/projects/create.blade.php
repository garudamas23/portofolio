@extends('admin.layout')

@section('title', 'Tambah Proyek')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Tambah Proyek Baru</h1>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul Proyek *</label>
                <input type="text" name="title" id="title" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi *</label>
                <textarea name="description" id="description" rows="4" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Deskripsi lengkap tentang proyek..."></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700">URL Gambar</label>
                    <input type="url" name="image_url" id="image_url"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://example.com/image.jpg">
                </div>

                <div>
                    <label for="project_url" class="block text-sm font-medium text-gray-700">URL Proyek</label>
                    <input type="url" name="project_url" id="project_url"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://example.com">
                </div>

                <div>
                    <label for="github_url" class="block text-sm font-medium text-gray-700">URL GitHub</label>
                    <input type="url" name="github_url" id="github_url"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="https://github.com/username/repo">
                </div>
            </div>

            <div>
                <label for="technologies" class="block text-sm font-medium text-gray-700">Teknologi *</label>
                <input type="text" name="technologies" id="technologies" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Laravel, Vue.js, MySQL, Tailwind CSS">
                <p class="mt-1 text-sm text-gray-500">Pisahkan dengan koma</p>
            </div>

            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="featured" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700">Tampilkan sebagai proyek featured</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.projects.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-3 hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Simpan Proyek
            </button>
        </div>
    </form>
</div>
@endsection