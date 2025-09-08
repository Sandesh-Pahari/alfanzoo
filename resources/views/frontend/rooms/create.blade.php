@extends('template.template')

@section('pagecontent')
    <div class="max-w-3xl mx-auto mt-12 bg-white p-8 shadow-lg rounded-xl">
        <h1 class="text-2xl font-bold text-blue-800 mb-6">Add New Room</h1>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="block font-semibold">Room Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="border p-2 w-full">
                @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Type</label>
                <input type="text" name="type" value="{{ old('type') }}" class="border p-2 w-full"
                    placeholder="Deluxe, Suite...">
                @error('type')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="block font-semibold">Description</label>
                <textarea name="description" class="border p-2 w-full" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <div>
                    <label class="block font-semibold">Capacity</label>
                    <input type="number" name="capacity" min="1" value="{{ old('capacity') }}"
                        class="border p-2 w-full">
                    @error('capacity')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block font-semibold">Beds</label>
                    <input type="text" name="beds" min="1" value="{{ old('beds') }}"
                        class="border p-2 w-full">
                    @error('beds')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block font-semibold">Price (per night)</label>
                    <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}"
                        class="border p-2 w-full">
                    @error('price')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4 mb-3">
                <label class="block font-semibold">Image</label>
                <input type="file" name="image" class="border p-2 w-full">
                @error('image')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block font-semibold mb-2">Facilities</label>
                <div id="facilities-container">
                    {{-- preserve old values --}}
                    @if (old('facilities'))
                        @foreach (old('facilities') as $f)
                            <div class="flex gap-2 mb-2">
                                <input type="text" name="facilities[]" value="{{ $f }}"
                                    placeholder="e.g. WiFi" class="border p-2 w-full">
                                <button type="button" onclick="removeThis(this)" class="px-2">✕</button>
                            </div>
                        @endforeach
                    @else
                        <div class="flex gap-2 mb-2">
                            <input type="text" name="facilities[]" placeholder="e.g. WiFi" class="border p-2 w-full">
                            <button type="button" onclick="removeThis(this)" class="px-2">✕</button>
                        </div>
                    @endif
                </div>
                @error('facilities')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
                @error('facilities.*')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror

                <div class="mt-2">
                    <button type="button" onclick="addFacility()" class="bg-blue-500 text-white px-3 py-1 rounded">+ Add
                        Facility</button>
                </div>
            </div>

            <div class="flex gap-3 mt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                    Save
                </button>
                <button type="button" onclick="window.history.back()" class="bg-gray-400 text-white px-4 py-2 rounded">
                    Cancel
                </button>
            </div>
        </form>
    </div>

    <script>
        function addFacility() {
            let container = document.getElementById('facilities-container');
            let wrapper = document.createElement('div');
            wrapper.className = 'flex gap-2 mb-2';
            wrapper.innerHTML =
                `<input type="text" name="facilities[]" placeholder="e.g. Swimming Pool" class="border p-2 w-full"><button type="button" onclick="removeThis(this)" class="px-2">✕</button>`;
            container.appendChild(wrapper);
        }

        function removeThis(btn) {
            btn.parentNode.remove();
        }
    </script>
@endsection
