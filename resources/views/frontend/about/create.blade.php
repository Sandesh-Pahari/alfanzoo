@extends('template.template')

@section('pagecontent')
<div class="max-w-2xl mx-auto  mt-20">
    <h2 class="text-2xl font-bold mb-6">Create About Us</h2>
    <form method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Title" class="w-full border p-2 rounded" required>
        <textarea name="description" placeholder="Description" class="w-full border p-2 rounded" rows="5" required></textarea>
        <input type="file" name="image" class="w-full border p-2 rounded">
        <button type="submit" class="px-4 py-2  text-black rounded">Save</button>
    </form>
</div>
@endsection
