@extends('template.template')

@section('pagecontent')
    @php
        $facilities = is_array($room->facilities) ? $room->facilities : json_decode($room->facilities, true) ?? [];
        $imageUrl = $room->image ? asset('storage/' . $room->image) : asset('images/room-placeholder.jpg');
    @endphp

    <div class="min-h-screen bg-gradient-to-br from-alfan-white via-white to-brand-sun/10">
        <!-- Hero Section with Parallax Effect -->
        <div class="relative w-full h-[85vh] overflow-hidden group bg-alfan-black">
            <!-- Background Image with Proper Cover -->
            <div class="absolute inset-0 transform transition-transform duration-1000 group-hover:scale-110">
                <img src="{{ $imageUrl }}" alt="{{ $room->name }}" class="w-full h-full object-cover opacity-90">
            </div>

            <!-- Multi-layer Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-alfan-black via-alfan-black/50 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-alfan-black/40 to-transparent"></div>

            <!-- Animated Status Badge -->
            
                <div class="absolute top--24 right-10 z-20 pt-24">
                    <div class="relative">
                        <div class="absolute inset-0 bg-alfan-green animate-ping rounded-full opacity-75"></div>
                        <div
                            class="relative bg-alfan-green/90 backdrop-blur-md text-alfan-white px-6 py-3 rounded-full font-bold shadow-2xl flex items-center gap-2">
                            <span class="w-2 h-2 bg-alfan-white rounded-full animate-pulse"></span>
                            Available Now
                        </div>
                    </div>
                </div>
            

            <!-- Hero Content with Animation -->
            <div class="absolute bottom-0 left-0 right-0 p-16 md:px-16 md:py-32 z-10">
                <div class="max-w-7xl mx-auto">
                    <div class="space-y-6 animate-fadeInUp">
                        <!-- Room Type Badge -->
                        <div
                            class="inline-flex items-center gap-3 bg-alfan-orange/20 backdrop-blur-lg border border-alfan-orange/30 px-6 py-3 rounded-full text-brand-sun">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            <span
                                class="font-semibold text-sm uppercase tracking-wider">{{ ucfirst($room->type ?? 'Premium Suite') }}</span>
                        </div>

                        <!-- Room Name with Glow Effect -->
                        <h1
                            class="text-5xl md:text-7xl font-black italic text-alfan-white tracking-tight leading-tight drop-shadow-2xl">
                            {{ $room->name }}
                        </h1>

                        <!-- Price Display with Animation -->
                        {{-- <div class="flex items-baseline gap-3">
                            <span
                                class="text-5xl md:text-6xl font-thin text-brand-sun drop-shadow-lg">₹{{ number_format($room->price ?? 0, 0) }}</span>
                            <span class="text-2xl text-brand-sun/70 font-light">/night</span>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Decorative Elements -->
            <div class="absolute top-1/2 left-10 w-20 h-20 bg-brand-gold/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/3 right-20 w-32 h-32 bg-brand-sky/20 rounded-full blur-3xl animate-pulse delay-1000">
            </div>
        </div>

        <!-- Floating Stats Bar -->
        <div class="relative -mt-20 z-20 mx-8 lg:mx-auto max-w-5xl">
            <div class="bg-white/95 backdrop-blur-xl shadow-2xl rounded-3xl border border-brand-gold/20 overflow-hidden">
                <div class="grid grid-cols-2 md:grid-cols-4">
                    <!-- Guests -->
                    <div class="relative group">
                        <div
                            class="p-8 text-center hover:bg-gradient-to-br hover:from-alfan-green-light/10 hover:to-alfan-green/10 transition-all duration-500">
                            <div
                                class="text-4xl mb-3 transform group-hover:scale-125 group-hover:rotate-12 transition-all duration-500">
                                👥</div>
                            <div
                                class="text-3xl font-black bg-gradient-to-r from-alfan-green to-alfan-green-dark bg-clip-text text-transparent">
                                {{ $room->capacity ?? 2 }}</div>
                            <div class="text-sm text-gray-600 font-medium mt-1">Guests</div>
                        </div>
                    </div>

                    <!-- Beds -->
                    <div class="relative group border-l border-gray-100">
                        <div
                            class="p-8 text-center hover:bg-gradient-to-br hover:from-alfan-orange-light/10 hover:to-alfan-orange/10 transition-all duration-500">
                            <div
                                class="text-4xl mb-3 transform group-hover:scale-125 group-hover:-rotate-12 transition-all duration-500">
                                🛏️</div>
                            <div
                                class="text-3xl font-black bg-gradient-to-r from-alfan-orange to-alfan-orange-dark bg-clip-text text-transparent">
                                {{ $room->beds ?? 1 }}</div>
                            <div class="text-sm text-gray-600 font-medium mt-1">Beds</div>
                        </div>
                    </div>

                    <!-- Swimming Pool -->
                    <div class="relative group border-l border-gray-100">
                        <div
                            class="p-8 text-center hover:bg-gradient-to-br hover:from-brand-sky/10 hover:to-brand-aqua/10 transition-all duration-500">
                            <div
                                class="text-4xl mb-3 transform group-hover:scale-125 group-hover:rotate-12 transition-all duration-500">
                                🏊</div>
                            <div
                                class="text-3xl font-black bg-gradient-to-r from-brand-sky to-brand-aqua bg-clip-text text-transparent">
                                Yes</div>
                            <div class="text-sm text-gray-600 font-medium mt-1">Pool Access</div>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="relative group border-l border-gray-100">
                        <div
                            class="p-8 text-center hover:bg-gradient-to-br hover:from-brand-sky/10 hover:to-brand-aqua/10 transition-all duration-500">
                            <div
                                class="text-4xl mb-3 transform group-hover:scale-125 group-hover:rotate-12 transition-all duration-500">
                                <svg fill="#d69e2e" height="40px" width="40px" version="1.1" id="Capa_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 59.997 59.997" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path
                                                d="M59.206,0.293c-0.391-0.391-1.023-0.391-1.414,0L54.084,4H30.802L1.532,33.511c-0.667,0.666-1.034,1.553-1.034,2.495 s0.367,1.829,1.034,2.495l20.466,20.466c0.687,0.687,1.588,1.03,2.491,1.03c0.906,0,1.814-0.346,2.508-1.04l28.501-29.271V5.414 l3.707-3.707C59.596,1.316,59.596,0.684,59.206,0.293z M53.499,28.874L25.574,57.553c-0.595,0.596-1.565,0.596-2.162,0 L2.946,37.087c-0.289-0.289-0.448-0.673-0.448-1.081s0.159-0.792,0.451-1.084L31.635,6h20.45l-4.833,4.833 C46.461,10.309,45.516,10,44.499,10c-2.757,0-5,2.243-5,5s2.243,5,5,5s5-2.243,5-5c0-1.017-0.309-1.962-0.833-2.753l4.833-4.833 V28.874z M47.499,15c0,1.654-1.346,3-3,3s-3-1.346-3-3s1.346-3,3-3c0.462,0,0.894,0.114,1.285,0.301l-1.992,1.992 c-0.391,0.391-0.391,1.023,0,1.414C43.987,15.902,44.243,16,44.499,16s0.512-0.098,0.707-0.293l1.992-1.992 C47.385,14.106,47.499,14.538,47.499,15z">
                                            </path>
                                            <path
                                                d="M40.412,21.131c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0l-0.746,0.746c-1.787-1.43-4.055-2.133-6.37-1.937 c-1.613,0.135-3.073,0.914-4.111,2.193c-1.068,1.317-1.561,3.039-1.35,4.724l0.761,6.09l-8.947,8.947 c-2.05-2.74-1.838-6.647,0.65-9.136c0.391-0.391,0.391-1.023,0-1.414s-1.023-0.391-1.414,0c-3.27,3.27-3.49,8.449-0.665,11.979 l-1.142,1.142c-0.391,0.391-0.391,1.023,0,1.414c0.195,0.195,0.451,0.293,0.707,0.293s0.512-0.098,0.707-0.293l1.143-1.143 c1.593,1.273,3.566,1.972,5.611,1.972c0.251,0,0.503-0.011,0.756-0.032c1.613-0.134,3.073-0.912,4.111-2.192 c1.069-1.317,1.562-3.04,1.351-4.725l-0.761-6.09l8.947-8.947c2.049,2.74,1.838,6.648-0.651,9.137 c-0.391,0.391-0.391,1.023,0,1.414s1.023,0.391,1.414,0c3.27-3.271,3.489-8.45,0.665-11.98L40.412,21.131z M28.063,38.594 c0.144,1.147-0.191,2.319-0.919,3.217c-0.692,0.853-1.659,1.371-2.724,1.46c-1.718,0.135-3.408-0.359-4.771-1.376l7.846-7.847 L28.063,38.594z M28.404,25.195c-0.144-1.146,0.191-2.319,0.918-3.216c0.692-0.853,1.66-1.371,2.725-1.461 c1.718-0.141,3.409,0.358,4.772,1.376l-7.847,7.847L28.404,25.195z">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div
                                class="text-3xl font-black bg-gradient-to-r from-brand-sky to-brand-aqua bg-clip-text text-transparent">
                              Rs {{ number_format($room->price ?? 0, 0) }} </div>
                            <div class="text-sm text-gray-600 font-medium mt-1">Per Night</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-8 md:px-12 py-20 space-y-24">

            <!-- Description Section -->
            <section class="relative">
                <div class="flex items-start gap-6">
                    <div class="hidden md:block">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-alfan-green to-alfan-green-dark rounded-2xl flex items-center justify-center text-white shadow-xl">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-4xl font-black text-alfan-black mb-8">About This Room</h2>
                        <div class="relative">
                            <div
                                class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-alfan-green via-brand-olive to-brand-aqua rounded-full">
                            </div>
                            <div
                                class="pl-8 pr-8 py-8 bg-gradient-to-r from-alfan-white to-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500">
                                <p class="text-lg leading-relaxed text-gray-700">
                                    {{ $room->description ?? 'Experience unparalleled luxury in this meticulously designed space. Every element has been thoughtfully curated to provide the ultimate in comfort and sophistication. From premium furnishings to breathtaking views, this room offers a sanctuary of tranquility and elegance.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Facilities Grid -->
            <section>
                <div class="flex items-center gap-6 mb-10">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-alfan-orange to-alfan-orange-dark rounded-2xl flex items-center justify-center text-white shadow-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-black text-alfan-black">Premium Facilities</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @if (count($facilities) > 0)
                        @foreach ($facilities as $f)
                            <div class="group relative">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-brand-sun to-brand-gold opacity-0 group-hover:opacity-100 rounded-2xl blur-xl transition-all duration-500">
                                </div>
                                <div
                                    class="relative bg-white border-2 border-gray-100 rounded-2xl p-5 hover:border-brand-gold/50 hover:transform hover:-translate-y-2 transition-all duration-300">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-12 h-12 bg-gradient-to-br from-brand-sun/30 to-brand-gold/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                            <span class="text-2xl text-brand-gold">✓</span>
                                        </div>
                                        <span
                                            class="font-bold text-gray-700 group-hover:text-alfan-black transition-colors">{{ $f }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 col-span-full text-center py-8">No facilities information available.</p>
                    @endif
                </div>
            </section>


            <!-- Action Buttons -->
            <section class="flex flex-wrap gap-5 justify-center pt-8">
                <a href="{{ route('rooms.index') }}"
                    class="group relative px-10 py-5 bg-white border-2 border-alfan-green rounded-2xl font-bold text-alfan-green hover:bg-alfan-green hover:text-white transition-all duration-300 overflow-hidden">
                    <span class="relative z-10 flex items-center gap-3 text-lg">
                        <svg class="w-6 h-6 transform group-hover:-translate-x-2 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        Browse Rooms
                    </span>
                </a>
                @auth
                    <a href="{{ route('rooms.edit', $room->id) }}"
                        class="group relative px-10 py-5 bg-gradient-to-r from-alfan-orange to-alfan-orange-dark text-white rounded-2xl font-bold hover:shadow-2xl hover:scale-105 transition-all duration-300 overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-alfan-orange-dark to-brand-gold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                        <span class="relative z-10 flex items-center gap-3 text-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Details
                        </span>
                    </a>


                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                        onsubmit="return confirm('Delete this room permanently?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="group relative px-10 py-5 bg-red-500 text-white rounded-2xl font-bold hover:bg-red-600 hover:shadow-2xl transition-all duration-300">
                            <span class="flex items-center gap-3 text-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Delete
                            </span>
                        </button>
                    </form>
                @endauth

                <a href=" {{ route('booking.create', $room->id) }}"
                    class="group relative px-10 py-5 bg-gradient-to-r from-alfan-green to-alfan-green-dark text-white rounded-2xl font-bold hover:shadow-2xl hover:scale-105 transition-all duration-300 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-alfan-green-dark to-brand-olive opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <span class="relative z-10 flex items-center gap-3 text-lg">
                        <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Book Now
                    </span>
                </a>
            </section>

            <!-- Special Features -->
            <section class="relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-brand-sky/5 via-brand-aqua/5 to-alfan-green-light/5 rounded-3xl">
                </div>
                <div class="relative p-12 rounded-3xl">
                    <h2 class="text-4xl font-black text-alfan-black mb-12 text-center">Why Choose This Room?</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="group">
                            <div
                                class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500">
                                <div
                                    class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-brand-sky to-brand-aqua rounded-3xl flex items-center justify-center text-white text-3xl shadow-lg group-hover:rotate-12 transition-transform duration-500">
                                    🌊
                                </div>
                                <h3 class="font-black text-xl mb-3 text-center text-alfan-black">Lake Views</h3>
                                <p class="text-gray-600 text-center">Panoramic vistas of endless blue horizons</p>
                            </div>
                        </div>

                        <div class="group">
                            <div
                                class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500">
                                <div
                                    class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-alfan-green to-brand-olive rounded-3xl flex items-center justify-center text-white text-3xl shadow-lg group-hover:-rotate-12 transition-transform duration-500">
                                    🍃
                                </div>
                                <h3 class="font-black text-xl mb-3 text-center text-alfan-black">Eco Luxury</h3>
                                <p class="text-gray-600 text-center">Sustainable comfort without compromise</p>
                            </div>
                        </div>

                        <div class="group">
                            <div
                                class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-500">
                                <div
                                    class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-brand-gold to-alfan-orange rounded-3xl flex items-center justify-center text-white text-3xl shadow-lg group-hover:rotate-12 transition-transform duration-500">
                                    ✨
                                </div>
                                <h3 class="font-black text-xl mb-3 text-center text-alfan-black">Premium Service</h3>
                                <p class="text-gray-600 text-center">24/7 concierge at your service</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



            <!-- Footer Meta -->
            <div class="text-center text-gray-500 text-sm pt-12 border-t-2 border-brand-sun/20">
                <p class="font-medium">Added {{ $room->created_at?->format('F j, Y') }} · Updated
                    {{ $room->updated_at?->diffForHumans() }}</p>
            </div>
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(3deg);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .delay-1000 {
            animation-delay: 1s;
        }
    </style>
@endsection
