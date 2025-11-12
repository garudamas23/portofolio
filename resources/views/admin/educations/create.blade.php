@extends('admin.layout')

@section('title', 'Tambah Pendidikan')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Tambah Pendidikan Baru</h1>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.educations.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="degree" class="block text-sm font-medium text-gray-700">Gelar *</label>
                <input type="text" name="degree" id="degree" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="institution" class="block text-sm font-medium text-gray-700">Institusi *</label>
                <input type="text" name="institution" id="institution" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="start_year" class="block text-sm font-medium text-gray-700">Tahun Mulai *</label>
                <input type="number" name="start_year" id="start_year" min="1900" max="{{ date('Y') }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="end_year" class="block text-sm font-medium text-gray-700">Tahun Selesai</label>
                <input type="number" name="end_year" id="end_year" min="1900" max="{{ date('Y') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="current" value="1" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Masih Berjalan</span>
                    </label>
                </div>
            </div>

            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Deskripsi singkat tentang pendidikan..."></textarea>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.educations.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-3 hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Simpan Pendidikan
            </button>
        </div>
    </form>
</div>
@endsection