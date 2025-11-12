@extends('admin.layout')

@section('title', 'Edit Skill')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Edit Skill</h1>
</div>

<div class="bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Skill *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Kategori *</label>
                <select name="category" id="category" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Kategori</option>
                    <option value="programming" {{ old('category', $skill->category) == 'programming' ? 'selected' : '' }}>Programming</option>
                    <option value="framework" {{ old('category', $skill->category) == 'framework' ? 'selected' : '' }}>Framework</option>
                    <option value="tool" {{ old('category', $skill->category) == 'tool' ? 'selected' : '' }}>Tool</option>
                    <option value="soft_skill" {{ old('category', $skill->category) == 'soft_skill' ? 'selected' : '' }}>Soft Skill</option>
                </select>
            </div>

            <div>
                <label for="level" class="block text-sm font-medium text-gray-700">Level (1-5) *</label>
                <select name="level" id="level" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Pilih Level</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('level', $skill->level) == $i ? 'selected' : '' }}>
                            {{ $i }} - {{ $i == 1 ? 'Pemula' : ($i == 5 ? 'Ahli' : 'Menengah') }}
                        </option>
                    @endfor
                </select>
            </div>

            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700">Icon FontAwesome</label>
                <input type="text" name="icon" id="icon" value="{{ old('icon', $skill->icon) }}" placeholder="contoh: laravel, react, js"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="mt-1 text-sm text-gray-500">Nama icon dari FontAwesome (tanpa 'fa-' prefix)</p>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('admin.skills.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg mr-3 hover:bg-gray-400 transition">
                Batal
            </a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Update Skill
            </button>
        </div>
    </form>
</div>
@endsection