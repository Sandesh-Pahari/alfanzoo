@extends('template.template')

@section('pagecontent')
<div class="max-w-2xl mx-auto py-12">
    <h2 class="text-2xl font-bold mb-6">Edit About Us</h2>
    <form method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $about->title }}" class="w-full border p-2 rounded" required>
        <textarea name="description" class="w-full border p-2 rounded" rows="5" required>{{ $about->description }}</textarea>
        <input type="file" name="image" class="w-full border p-2 rounded">
        @if($about->image)
            <img src="{{ asset('storage/'.$about->image) }}" class="w-40 mt-2">
        @endif
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    </form>
</div>
@endsection
