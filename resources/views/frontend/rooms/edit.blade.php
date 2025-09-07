@extends('template.template')

@section('pagecontent')
<div class="max-w-3xl mx-auto mt-12 bg-white p-8 shadow-lg rounded-xl">
    <h1 class="text-2xl font-bold text-blue-800 mb-6">Edit Room</h1>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-semibold">Room Name</label>
            <input type="text" name="name" value="{{ $room->name }}" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block text-sm font-semibold">Type</label>
            <input type="text" name="type" value="{{ $room->type }}" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-semibold">Capacity</label>
                <input type="number" name="capacity" value="{{ $room->capacity }}" class="w-full border rounded-lg px-3 py-2" required>
            </div>
            <div>
                <label class="block text-sm font-semibold">Beds</label>
                <input type="number" name="beds" value="{{ $room->beds }}" class="w-full border rounded-lg px-3 py-2" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold">Price (per night)</label>
            <input type="number" step="0.01" name="price" value="{{ $room->price }}" class="w-full border rounded-lg px-3 py-2" required>
        </div>

        <div>
            <label class="block text-sm font-semibold">Image</label>
            @if($room->image)
                <img src="{{ asset('storage/' . $room->image) }}" class="h-32 mb-2 rounded-lg">
            @endif
            <input type="file" name="image" class="w-full border rounded-lg px-3 py-2">
        </div>

        <button type="submit" 
                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-bold">
            Update Room
        </button>
    </form>
</div>
@endsection
