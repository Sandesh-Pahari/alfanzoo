@extends('template.template')

@section('pagecontent')
    @php
        $facilities = is_array($room->facilities) ? $room->facilities : json_decode($room->facilities, true) ?? [];
        $imageUrl = $room->image ? asset('storage/' . $room->image) : asset('images/room-placeholder.jpg');
    @endphp

    <div class="min-h-screen bg-gradient-to-br from-alfan-white via-white to-brand-sun/10">
        <!-- Hero Section -->
        <div class="relative w-full h-[85vh] overflow-hidden group bg-alfan-black">
            <!-- Background Image -->
            <div class="absolute inset-0 transform transition-transform duration-1000 group-hover:scale-110">
                <img src="{{ $imageUrl }}" alt="{{ $room->name }}" class="w-full h-full object-cover opacity-90">
            </div>

            <!-- Gradient Overlays -->
            <div class="absolute inset-0 bg-gradient-to-t from-alfan-black via-alfan-black/50 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-alfan-black/40 to-transparent"></div>

            <!-- Availability Badge -->
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

            <!-- Room Info -->
            <div class="absolute bottom-0 left-0 right-0 p-16 md:px-16 md:py-32 z-10">
                <div class="max-w-7xl mx-auto">
                    <div class="space-y-6 animate-fadeInUp">
                        <div
                            class="inline-flex items-center gap-3 bg-alfan-orange/20 backdrop-blur-lg border border-alfan-orange-dark/40 px-6 py-3 rounded-full text-alfan-orange">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            <span class="font-semibold text-sm uppercase tracking-wider">
                                {{ ucfirst($room->type ?? 'Premium Suite') }}
                            </span>
                        </div>

                        <h1 class="text-5xl md:text-7xl font-black italic text-alfan-white tracking-tight leading-tight drop-shadow-2xl">
                            {{ $room->name }}
                        </h1>
                    </div>
                </div>
            </div>

            <!-- Decorative Circles -->
            <div class="absolute top-1/2 left-10 w-20 h-20 bg-brand-gold/30 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/3 right-20 w-32 h-32 bg-brand-sky/30 rounded-full blur-3xl animate-pulse delay-1000"></div>
        </div>

        <!-- Floating Stats -->
        <div class="relative -mt-20 z-20 mx-8 lg:mx-auto max-w-5xl">
            <div class="bg-alfan-white/95 backdrop-blur-xl shadow-2xl rounded-3xl border border-brand-gold/30 overflow-hidden">
                <div class="grid grid-cols-2 md:grid-cols-4">
                    <!-- Guests -->
                    <div class="relative group">
                        <div class="p-8 text-center hover:bg-alfan-green/10 transition-all duration-500">
                            <div class="text-4xl mb-3 transform group-hover:scale-125 transition-all">👥</div>
                            <div class="text-3xl font-black text-alfan-green-dark">
                                {{ $room->capacity ?? 2 }}
                            </div>
                            <div class="text-sm text-brand-brown font-medium mt-1">Guests</div>
                        </div>
                    </div>

                    <!-- Beds -->
                    <div class="relative group border-l border-brand-gold/20">
                        <div class="p-8 text-center hover:bg-alfan-orange/10 transition-all duration-500">
                            <div class="text-4xl mb-3 transform group-hover:scale-125 transition-all">🛏️</div>
                            <div class="text-3xl font-black text-alfan-orange-dark">
                                {{ $room->beds ?? 1 }}
                            </div>
                            <div class="text-sm text-brand-brown font-medium mt-1">Beds</div>
                        </div>
                    </div>

                    <!-- Pool -->
                    <div class="relative group border-l border-brand-gold/20">
                        <div class="p-8 text-center hover:bg-brand-sky/10 transition-all duration-500">
                            <div class="text-4xl mb-3 transform group-hover:scale-125 transition-all">🏊</div>
                            <div class="text-3xl font-black text-brand-sky">
                                Yes
                            </div>
                            <div class="text-sm text-brand-brown font-medium mt-1">Pool Access</div>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="relative group border-l border-brand-gold/20">
                        <div class="p-8 text-center hover:bg-brand-gold/10 transition-all duration-500">
                            <div class="text-4xl mb-3">💰</div>
                            <div class="text-3xl font-black text-brand-gold">
                                Rs {{ number_format($room->price ?? 0, 0) }}
                            </div>
                            <div class="text-sm text-brand-brown font-medium mt-1">Per Night</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto px-8 md:px-12 py-20 space-y-24">

            <!-- Description -->
            <section class="relative">
                <div class="flex items-start gap-6">
                    <div class="hidden md:block">
                        <div class="w-16 h-16 text-4xl bg-alfan-green rounded-2xl flex items-center justify-center text-white shadow-xl">
                            📜
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-4xl font-black text-alfan-black mb-8">About This Room</h2>
                        <div class="relative">
                            <div class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-alfan-green to-brand-aqua rounded-full"></div>
                            <div class="pl-8 pr-8 py-8 bg-alfan-white rounded-2xl shadow-lg hover:shadow-2xl transition-all">
                                <p class="text-lg leading-relaxed text-brand-brown">
                                    {{ $room->description ?? 'Experience unparalleled luxury in this meticulously designed space...' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Facilities -->
            <section>
                <div class="flex items-center gap-6 mb-10">
                    <div class="w-16 h-16 bg-alfan-orange-dark rounded-2xl flex items-center justify-center text-white shadow-xl">
                        ⭐
                    </div>
                    <h2 class="text-4xl font-black text-alfan-black">Premium Facilities</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @if (count($facilities) > 0)
                        @foreach ($facilities as $f)
                            <div class="group relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-brand-sun to-brand-gold opacity-0 group-hover:opacity-100 rounded-2xl blur-xl transition-all"></div>
                                <div class="relative bg-white border-2 border-brand-sun/40 rounded-2xl p-5 hover:border-brand-gold hover:-translate-y-2 transition-all">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-brand-sun/30 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                            <span class="text-2xl text-brand-gold">✓</span>
                                        </div>
                                        <span class="font-bold text-alfan-black">{{ $f }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-brand-olive col-span-full text-center py-8">No facilities information available.</p>
                    @endif
                </div>
            </section>

            <!-- Action Buttons -->
            <section class="flex flex-wrap gap-5 justify-center pt-8">
                <a href="{{ route('rooms.index') }}"
                    class="px-10 py-5 bg-alfan-white border-2 border-alfan-green text-alfan-green rounded-2xl font-bold hover:bg-alfan-green hover:text-alfan-white transition-all">
                    Browse Rooms
                </a>

                @auth
                    <a href="{{ route('rooms.edit', $room->id) }}"
                        class="px-10 py-5 bg-alfan-orange text-alfan-white rounded-2xl font-bold hover:bg-alfan-orange-dark transition-all">
                        Edit Details
                    </a>

                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                        onsubmit="return confirm('Delete this room permanently?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-10 py-5 bg-brand-brown text-alfan-white rounded-2xl font-bold hover:bg-alfan-black transition-all">
                            Delete
                        </button>
                    </form>
                @endauth

                <a href="{{ route('booking.create', $room->id) }}"
                    class="px-10 py-5 bg-alfan-green text-alfan-white rounded-2xl font-bold hover:bg-alfan-green-dark transition-all">
                    Book Now
                </a>
            </section>

            <!-- Special Features -->
            <section class="relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-sky/5 via-brand-aqua/5 to-alfan-green-light/5 rounded-3xl"></div>
                <div class="relative p-12 rounded-3xl">
                    <h2 class="text-4xl font-black text-alfan-black mb-12 text-center">Why Choose This Room?</h2>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all">
                            <div class="w-20 h-20 mx-auto mb-6 bg-brand-sky text-alfan-white rounded-3xl flex items-center justify-center text-3xl">
                                🌊
                            </div>
                            <h3 class="font-black text-xl mb-3 text-center text-alfan-black">Lake Views</h3>
                            <p class="text-brand-brown text-center">Panoramic vistas of endless blue horizons</p>
                        </div>

                        <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all">
                            <div class="w-20 h-20 mx-auto mb-6 bg-alfan-green text-alfan-white rounded-3xl flex items-center justify-center text-3xl">
                                🍃
                            </div>
                            <h3 class="font-black text-xl mb-3 text-center text-alfan-black">Eco Luxury</h3>
                            <p class="text-brand-brown text-center">Sustainable comfort without compromise</p>
                        </div>

                        <div class="group bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-3 transition-all">
                            <div class="w-20 h-20 mx-auto mb-6 bg-brand-gold text-alfan-white rounded-3xl flex items-center justify-center text-3xl">
                                ✨
                            </div>
                            <h3 class="font-black text-xl mb-3 text-center text-alfan-black">Premium Service</h3>
                            <p class="text-brand-brown text-center">24/7 concierge at your service</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer Meta -->
            <div class="text-center text-brand-brown text-sm pt-12 border-t-2 border-brand-sun/30">
                <p class="font-medium">
                    Added {{ $room->created_at?->format('F j, Y') }} · Updated {{ $room->updated_at?->diffForHumans() }}
                </p>
            </div>
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(3deg); }
        }
        .animate-float { animation: float 4s ease-in-out infinite; }
        .delay-1000 { animation-delay: 1s; }
    </style>
@endsection
