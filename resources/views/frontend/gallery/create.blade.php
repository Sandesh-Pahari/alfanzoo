@extends('template.template')

<!-- Background Gradient -->
<div class="min-h-screen w-full bg-gradient-to-b from-orange-50 to-white mt-20">
    <!-- Header Section -->
    <div class="text-center mb-12 animate-fade-in-down pt-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">
            <span class="text-pastry-primary">
                📸 Photo Upload
            </span>
        </h1>
        <p class="text-lg text-gray-600">Share your delicious creations with us</p>
    </div>

    <div class="max-w-2xl mx-auto mb-8 bg-white p-8 rounded-xl shadow-lg shadow-gray-100/50 relative transition-all duration-300 hover:shadow-xl hover:shadow-gray-200/50 border border-gray-100">
        <!-- Cancel Button -->
        <a href="{{ route('gallery.index') }}" class="absolute top-4 right-4">
            <button class="flex items-center justify-center w-10 h-10 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-full transition-all duration-300 hover:rotate-90">
                ✕
            </button>
        </a>

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <!-- Title Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title" required
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 bg-white focus:border-amber-400 focus:ring-2 focus:ring-amber-100 transition-all outline-none placeholder-gray-400 text-gray-700"
                        placeholder="Give your creation a name">
                </div>

                <!-- File Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Photo</label>
                    <div class="relative group">
                        <div id="dropzone"
                            class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center transition-all duration-300 
                                    group-hover:border-amber-400 group-hover:bg-amber-50/30 cursor-pointer bg-white">
                            <div class="space-y-3">
                                <div class="mx-auto w-12 h-12 bg-amber-50 rounded-full flex items-center justify-center transition-all duration-300 group-hover:bg-amber-100">
                                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-600">
                                        <span class="text-amber-600 font-medium">Click to upload</span>
                                        or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">Supports JPG, PNG (Max 20MB)</p>
                                </div>
                            </div>
                            <input type="file" name="file" id="file"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" required
                                accept="image/*">
                        </div>
                    </div>

                    <!-- Preview Container -->
                    <div id="preview-container" class="mt-6 hidden">
                        <div class="relative group">
                            <button type="button" id="remove-preview"
                                class="absolute -top-3 -right-3 bg-amber-600 text-white rounded-full w-7 h-7 
                                        flex items-center justify-center hover:bg-amber-700 transition-all
                                        shadow-sm hover:shadow-md">
                                &times;
                            </button>
                            <div class="rounded-xl overflow-hidden border border-gray-100 shadow-sm bg-white">
                                <img id="image-preview" class="w-full object-contain max-h-96" alt="Preview">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-brand-brown text-white py-3 px-6 rounded-lg 
                            font-semibold hover:from-amber-600 hover:to-amber-700 transition-all duration-300
                            transform hover:scale-[1.01] shadow-md hover:shadow-lg flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 text-amber-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    Upload Photo
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('file');
        const previewContainer = document.getElementById('preview-container');
        const imagePreview = document.getElementById('image-preview');

        // Drag and drop handlers
        dropzone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzone.classList.add('border-amber-400', 'bg-amber-50/50');
        });

        dropzone.addEventListener('dragleave', () => {
            dropzone.classList.remove('border-amber-400', 'bg-amber-50/50');
        });

        dropzone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropzone.classList.remove('border-amber-400', 'bg-amber-50/50');
            fileInput.files = e.dataTransfer.files;
            handleFile(e.dataTransfer.files[0]);
        });

        // File input change handler
        fileInput.addEventListener('change', (e) => {
            if (e.target.files.length) handleFile(e.target.files[0]);
        });

        // File handling function
        function handleFile(file) {
            if (!file.type.startsWith('image/')) {
                alert('Please upload an image file (JPG, PNG)');
                fileInput.value = '';
                return;
            }

            previewContainer.classList.remove('hidden');
            const reader = new FileReader();
            
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        // Remove preview handler
        document.getElementById('remove-preview').addEventListener('click', () => {
            fileInput.value = '';
            previewContainer.classList.add('hidden');
            imagePreview.src = '';
        });
    });
</script>
