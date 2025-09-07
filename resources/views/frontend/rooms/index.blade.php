@extends('template.template')
@section('pagecontent')
<section class="bg-gray-100 mt-16 xl:mt-20 min-h-screen w-full">
    <div class="flex flex-col items-center justify-center mt-6 px-10">
        <!-- Title -->
        <div class="flex items-center justify-center w-full max-w-4xl mx-auto xs:mb-4 mt-8">
            <div class="hidden sm:block flex-1 border-t-2 border-[#0b3e85]"></div>

            <h1 class="text-xl xs:text-2xl sm:text-3xl md:text-4xl font-bold text-[#0b3e85] xs:mx-4 sm:mx-8 text-center uppercase whitespace-nowrap">
                Available Rooms
            </h1>

            <div class="hidden sm:block flex-1 border-t-2 border-[#0b3e85]"></div>
        </div>

        <div class="mt-4 flex gap-4">
            @auth
            <a href="{{ route('rooms.create') }}" 
               class="bg-green-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-600 transition duration-300 shadow-md">
                Add Room
            </a>
            @endauth
        </div>
    </div>

    <div class="max-w-7xl mx-auto w-full grid grid-cols-1 xmd:grid-cols-2 lg:grid-cols-3 gap-6 mb-5 mt-6 px-8">
        @if($rooms->isEmpty())
            <p class="text-gray-500 text-center col-span-full">No rooms available.</p>
        @else
            @foreach ($rooms as $room)
            <div class="group bg-white rounded-3xl shadow-xl hover:shadow-lg transition-all duration-300 overflow-hidden border-6 border-white hover:border-blue-100/30 relative transform">
                <!-- Room Image -->
                <div class="relative overflow-hidden">
                    @if($room->image)
                    <img class="w-full h-56 object-cover transform group-hover:scale-105 transition-transform duration-500" 
                         src="{{ asset('storage/' . $room->image) }}" 
                         alt="{{ $room->name }}">
                    @else
                    <div class="w-full h-56 flex items-center justify-center bg-gray-200 text-gray-500">No Image</div>
                    @endif
                </div>

                <!-- Price Badge -->
                <div class="absolute top-56 left-1/2 -translate-x-1/2 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 text-white px-6 py-1.5 rounded-full text-base font-bold shadow-lg flex items-center gap-2 transform -translate-y-1/2 z-30 border-2 border-blue-200/30">
                    $ {{ $room->price }} / night
                </div>

                <!-- Content -->
                <div class="p-6 bg-gradient-to-b from-white to-blue-50/20">
                    <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-900 via-blue-800 to-blue-700 bg-clip-text text-transparent mb-4">
                        {{ $room->name }}
                    </h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center p-3 bg-white rounded-lg border shadow-md">
                            <span class="material-symbols-outlined text-blue-600/90 text-xl mr-3">bed</span>
                            <span class="text-base font-semibold">Type: {{ $room->type }}</span>
                        </div>
                        
                        <div class="flex items-center p-3 bg-white rounded-lg border shadow-md">
                            <span class="material-symbols-outlined text-blue-600/90 text-xl mr-3">group</span>
                            <span class="text-base font-semibold">Capacity: {{ $room->capacity }} people</span>
                        </div>
                        
                        <div class="flex items-center p-3 bg-white rounded-lg border shadow-md">
                            <span class="material-symbols-outlined text-blue-600/90 text-xl mr-3">hotel</span>
                            <span class="text-base font-semibold">Beds: {{ $room->beds }}</span>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="space-y-3">
                        <a href="{{ route('rooms.show', $room->id) }}" 
                           class="w-full bg-gradient-to-r from-blue-800 via-blue-700 to-blue-600 text-white py-4 rounded-xl font-bold flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-lg">visibility</span>
                            View Details
                        </a>

                        @auth
                        <div class="flex gap-3">
                            <a href="{{ route('rooms.edit', $room->id) }}" class="w-1/2">
                                <button class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-xl font-bold flex items-center justify-center gap-2 text-sm">
                                    <span class="material-symbols-outlined text-base">edit</span>
                                    Edit
                                </button>
                            </a>
                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="w-1/2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" 
                                    class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded-xl font-bold flex items-center justify-center gap-2 text-sm">
                                    <span class="material-symbols-outlined text-base">delete</span>
                                    Delete
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</section>

@endsection

