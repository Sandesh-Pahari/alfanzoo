<section class="bg-alfan-white min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col items-center justify-center">
        <!-- Title -->
        <div class="flex items-center justify-center w-full max-w-4xl mx-auto mb-6">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-brand-brown font-serif text-center">
                <span class="relative inline-block highlight-text">
                    Available Rooms
                </span>
            </h1>
        </div>
    </div>

    <div class="max-w-[85%] mx-auto w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        @foreach ($rooms as $index => $room)
            <div
                class="room-card bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-2xl reveal"
                data-sr-delay="{{ 100 + ($index * 100) }}">
                
                <!-- Room Image -->
                @if ($room->image)
                    <img class="w-full h-52 sm:h-56 md:h-60 lg:h-64 object-cover transition-transform duration-700 ease-in-out hover:scale-110"
                        src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}">
                @else
                    <div class="w-full h-52 sm:h-56 md:h-60 lg:h-64 flex items-center justify-center bg-gray-200 text-gray-500">No Image</div>
                @endif

                <!-- Content -->
                <div class="p-4 sm:p-6">
                    <!-- Title -->
                    <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-3">{{ $room->name }}</h3>

                    <!-- Features -->
                    <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-gray-600 text-sm mb-4">
                        <div class="flex items-center gap-2">
                            <svg width="24px" height="24px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3 18C3 15.3945 4.66081 13.1768 6.98156 12.348C7.61232 12.1227 8.29183 12 9 12C9.70817 12 10.3877 12.1227 11.0184 12.348C11.3611 12.4703 11.6893 12.623 12 12.8027C12.3107 12.623 12.6389 12.4703 12.9816 12.348C13.6123 12.1227 14.2918 12 15 12C15.7082 12 16.3877 12.1227 17.0184 12.348C19.3392 13.1768 21 15.3945 21 18V21H15.75V19.5H19.5V18C19.5 15.5147 17.4853 13.5 15 13.5C14.4029 13.5 13.833 13.6163 13.3116 13.8275C14.3568 14.9073 15 16.3785 15 18V21H3V18ZM9 11.25C8.31104 11.25 7.66548 11.0642 7.11068 10.74C5.9977 10.0896 5.25 8.88211 5.25 7.5C5.25 5.42893 6.92893 3.75 9 3.75C10.2267 3.75 11.3158 4.33901 12 5.24963C12.6842 4.33901 13.7733 3.75 15 3.75C17.0711 3.75 18.75 5.42893 18.75 7.5C18.75 8.88211 18.0023 10.0896 16.8893 10.74C16.3345 11.0642 15.689 11.25 15 11.25C14.311 11.25 13.6655 11.0642 13.1107 10.74C12.6776 10.4869 12.2999 10.1495 12 9.75036C11.7001 10.1496 11.3224 10.4869 10.8893 10.74C10.3345 11.0642 9.68896 11.25 9 11.25ZM13.5 18V19.5H4.5V18C4.5 15.5147 6.51472 13.5 9 13.5C11.4853 13.5 13.5 15.5147 13.5 18ZM11.25 7.5C11.25 8.74264 10.2426 9.75 9 9.75C7.75736 9.75 6.75 8.74264 6.75 7.5C6.75 6.25736 7.75736 5.25 9 5.25C10.2426 5.25 11.25 6.25736 11.25 7.5ZM15 5.25C13.7574 5.25 12.75 6.25736 12.75 7.5C12.75 8.74264 13.7574 9.75 15 9.75C16.2426 9.75 17.25 8.74264 17.25 7.5C17.25 6.25736 16.2426 5.25 15 5.25Z"
                                    fill="#d69e2e"></path>
                            </svg>
                            <span>{{ $room->capacity }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 5V19M3 16H21M21 19V13.2C21 12.0799 21 11.5198 20.782 11.092C20.5903 10.7157 20.2843 10.4097 19.908 10.218C19.4802 10 18.9201 10 17.8 10H11V15.7273M7 12H7.01M8 12C8 12.5523 7.55228 13 7 13C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11C7.55228 11 8 11.4477 8 12Z" stroke="#d69e2e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <span>{{ $room->beds }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg fill="#d69e2e" height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59.997 59.997">
                                <path d="M59.206,0.293c-0.391-0.391-1.023-0.391-1.414,0L54.084,4H30.802L1.532,33.511c-0.667,0.666-1.034,1.553-1.034,2.495 s0.367,1.829,1.034,2.495l20.466,20.466c0.687,0.687,1.588,1.03,2.491,1.03c0.906,0,1.814-0.346,2.508-1.04l28.501-29.271V5.414 l3.707-3.707C59.596,1.316,59.596,0.684,59.206,0.293z"/>
                            </svg>
                            <span>Rs {{ $room->price }} / night</span>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between gap-3">
                        <button onclick="window.location='{{ route('booking.create', $room->id) }}'"
                            class="w-full sm:w-auto px-4 py-2 inline-flex items-center gap-3 bg-brand-gold backdrop-blur-lg border border-alfan-orange/30 rounded-full hover:bg-brand-brown text-white hover:text-white transition-all duration-300 transform hover:scale-105">
                            BOOK NOW
                        </button>
                        <button onclick="window.location='{{ route('rooms.show', $room->id) }}'"
                            class="w-full sm:w-auto px-4 py-2 border border-brand-brown text-brand-brown text-sm font-medium rounded-full hover:bg-brand-brown hover:text-white transition-all duration-300 transform hover:scale-105">
                            VIEW DETAILS
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


{{-- ScrollReveal --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sr = ScrollReveal({
            reset: true,
            distance: '60px',
            duration: 600,
            easing: 'ease-in-out',
            origin: 'bottom'
        });

        document.querySelectorAll('.reveal').forEach((el) => {
            let delay = el.getAttribute('data-sr-delay') || 100;
            sr.reveal(el, { delay: parseInt(delay) });
        });
    });
</script>

