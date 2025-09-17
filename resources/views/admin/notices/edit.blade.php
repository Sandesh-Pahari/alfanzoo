{{-- resources/views/notices/edit.blade.php --}}
@extends('admin.dashboard')

@section('content')
<div class="max-w-3xl mx-auto mt-12 p-6 bg-white shadow-xl rounded-2xl">
    <h1 class="text-2xl font-bold text-orange-600 mb-6">✏️ Edit Notice</h1>

    <form action="{{ route('notices.update', $notice) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $notice->title) }}"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none"
                required>
            @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Message -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Message</label>
            <textarea name="message" rows="5"
                class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:outline-none"
                required>{{ old('message', $notice->message) }}</textarea>
            @error('message') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Image -->
        <div>
            <label class="block font-semibold text-gray-700 mb-1">Image (optional)</label>
            <input type="file" name="image"
                class="w-full border rounded-lg px-4 py-2 focus:outline-none">
            @error('image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror

            @if($notice->image)
                <div class="mt-3">
                    <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                    <img src="{{ asset('storage/'.$notice->image) }}" class="w-48 rounded-lg border shadow">
                </div>
            @endif
        </div>

        <!-- Submit -->
        <div class="flex justify-end gap-3">
            <a href="{{ route('notices.list') }}" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 shadow">
                Update Notice
            </button>
        </div>
    </form>
</div>
@endsection
