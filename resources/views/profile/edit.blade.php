{{-- File: resources/views/profile/edit.blade.php --}}
@extends('admin.layout')

@section('title', 'Edit Profil')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Edit Profil</h1>
    <p class="text-gray-600">Kelola informasi profil dan portfolio Anda</p>
</div>

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Informasi Profil Utama -->
    <div class="lg:col-span-2">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Informasi Profil Utama</h2>
            
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" id="profile-form">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Foto Profil dengan Cropper -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
                        <div class="space-y-4">
                            <!-- Current Photo -->
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    @if($user->photo)
                                        <img class="h-24 w-24 object-cover rounded-full border-2 border-gray-300" 
                                             src="{{ asset('storage/' . $user->photo) }}" 
                                             alt="{{ $user->name }}"
                                             id="current-photo">
                                    @else
                                        <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center border-2 border-gray-300">
                                            <i class="fas fa-user text-gray-400 text-2xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="photo" id="photo-input" 
                                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                           accept="image/*">
                                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, GIF. Maksimal 5MB</p>
                                </div>
                            </div>

                            <!-- Cropper Modal -->
                            <div id="cropper-modal" class="hidden fixed inset-0 bg-black bg-opacity-75 z-50 flex items-center justify-center p-4">
                                <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-hidden">
                                    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                                        <h3 class="text-lg font-semibold">Atur Foto Profil</h3>
                                        <button type="button" onclick="closeCropper()" class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-times text-xl"></i>
                                        </button>
                                    </div>
                                    <div class="p-4">
                                        <div class="mb-4">
                                            <div id="image-cropper" class="max-h-[400px] overflow-hidden"></div>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <div class="text-sm text-gray-600">
                                                <p>Drag untuk memposisikan wajah di dalam frame</p>
                                                <p>Zoom dengan scroll mouse</p>
                                            </div>
                                            <div class="space-x-3">
                                                <button type="button" onclick="closeCropper()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                                                    Batal
                                                </button>
                                                <button type="button" onclick="applyCrop()" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                                                    Terapkan Crop
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Preview Cropped Image -->
                            <div id="cropped-preview" class="hidden text-center">
                                <p class="text-sm font-medium text-gray-700 mb-2">Preview Foto Baru:</p>
                                <img id="cropped-image" class="h-24 w-24 rounded-full border-2 border-green-500 mx-auto object-cover">
                                <p class="text-green-600 text-sm mt-2">✅ Foto siap diupload</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden crop data fields -->
                    <input type="hidden" name="crop_x" id="crop-x">
                    <input type="hidden" name="crop_y" id="crop-y">
                    <input type="hidden" name="crop_width" id="crop-width">
                    <input type="hidden" name="crop_height" id="crop-height">

                    <!-- Form fields lainnya tetap sama -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="professional_title" class="block text-sm font-medium text-gray-700">Judul Profesional</label>
                        <input type="text" name="professional_title" id="professional_title" 
                               value="{{ old('professional_title', $user->professional_title) }}"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- ... lainnya tetap sama ... -->
                </div>

                <!-- Bio -->
                <div class="mt-6">
                    <label for="bio" class="block text-sm font-medium text-gray-700">Bio / Tentang Saya *</label>
                    <textarea name="bio" id="bio" rows="5" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('admin.dashboard') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition">
                        Batal
                    </a>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Sidebar - Update Password & Info -->
    <div class="space-y-6">
        <!-- Update Password -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Update Password</h2>
            
            <form method="POST" action="{{ route('profile.password.update') }}">
                @csrf
                @method('PUT')

                <div class="space-y-4">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Password Saat Ini *</label>
                        <input type="password" name="current_password" id="current_password" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('current_password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password Baru *</label>
                        <input type="password" name="password" id="password" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                        <i class="fas fa-key mr-2"></i> Update Password
                    </button>
                </div>
            </form>
        </div>  

        <!-- Quick Actions -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ url('/') }}" target="_blank" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center justify-center">
                    <i class="fas fa-eye mr-2"></i> Lihat Portfolio
                </a>
                <a href="{{ route('admin.dashboard') }}" class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition flex items-center justify-center">
                    <i class="fas fa-tachometer-alt mr-2"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Include Cropper.js CSS & JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<script>
let cropper;
let originalImageUrl;

// When photo input changes
document.getElementById('photo-input').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        const file = this.files[0];
        
        // Validate file type
        if (!file.type.match('image.*')) {
            alert('Harap pilih file gambar!');
            return;
        }

        // Validate file size (5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran file maksimal 5MB!');
            return;
        }

        // Show cropper modal
        openCropper(file);
    }
});

function openCropper(file) {
    const reader = new FileReader();
    
    reader.onload = function(e) {
        originalImageUrl = e.target.result;
        
        // Set up cropper container
        const cropperContainer = document.getElementById('image-cropper');
        cropperContainer.innerHTML = `<img id="image-to-crop" src="${originalImageUrl}" class="max-w-full">`;
        
        // Show modal
        document.getElementById('cropper-modal').classList.remove('hidden');
        
        // Initialize cropper
        const image = document.getElementById('image-to-crop');
        cropper = new Cropper(image, {
            aspectRatio: 1, // Square aspect ratio
            viewMode: 1,    // Restrict crop box to canvas
            dragMode: 'move',
            autoCropArea: 0.8,
            responsive: true,
            restore: false,
            guides: true,
            center: true,
            highlight: false,
            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false,
            ready: function() {
                // Set initial crop to center
                const containerData = cropper.getContainerData();
                const cropBoxData = {
                    width: Math.min(containerData.width, containerData.height) * 0.8,
                    height: Math.min(containerData.width, containerData.height) * 0.8
                };
                cropper.setCropBoxData(cropBoxData);
            }
        });
    };
    
    reader.readAsDataURL(file);
}

function closeCropper() {
    document.getElementById('cropper-modal').classList.add('hidden');
    document.getElementById('photo-input').value = '';
    
    if (cropper) {
        cropper.destroy();
        cropper = null;
    }
}

function applyCrop() {
    if (!cropper) return;

    // Get crop data
    const cropData = cropper.getData();
    
    // Set hidden input values
    document.getElementById('crop-x').value = Math.round(cropData.x);
    document.getElementById('crop-y').value = Math.round(cropData.y);
    document.getElementById('crop-width').value = Math.round(cropData.width);
    document.getElementById('crop-height').value = Math.round(cropData.height);
    
    // Get cropped image as blob for preview
    cropper.getCroppedCanvas({
        width: 200,
        height: 200,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high'
    }).toBlob(function(blob) {
        // Create preview URL
        const previewUrl = URL.createObjectURL(blob);
        
        // Show preview
        document.getElementById('cropped-image').src = previewUrl;
        document.getElementById('cropped-preview').classList.remove('hidden');
        
        // Hide current photo
        document.getElementById('current-photo').style.display = 'none';
    }, 'image/jpeg', 0.9);

    // Close modal
    closeCropper();
}

// Clean up URL objects when leaving page
window.addEventListener('beforeunload', function() {
    if (originalImageUrl) {
        URL.revokeObjectURL(originalImageUrl);
    }
});
</script>

<style>
.cropper-view-box,
.cropper-face {
    border-radius: 50%;
}

.cropper-view-box {
    outline: 2px solid #39f;
    outline-color: rgba(51, 153, 255, 0.75);
}

.cropper-line {
    background-color: #39f;
}

.cropper-point {
    background-color: #39f;
    opacity: 0.75;
}

.cropper-point.point-se {
    background-color: #39f;
}
</style>
@endsection