@extends('template.template')
@section('pagecontent')
    <section class="bg-brand-sun/10 mt-16 xl:mt-20 min-h-screen w-full">
        <div class="flex flex-col items-center justify-center mt-6 px-10">
            <!-- Title -->
            <div class="flex items-center justify-center w-full max-w-4xl mx-auto xs:mb-4 mt-8">
                <div class="hidden sm:block flex-1 border-t-2  border-brand-brown"></div>

                <h1
                    class="text-xl xs:text-2xl sm:text-3xl md:text-4xl font-bold text-brand-brown xs:mx-4 sm:mx-8 text-center uppercase whitespace-nowrap">
                    Available Rooms
                </h1>

                <div class="hidden sm:block flex-1 border-t-2 border-brand-brown"></div>
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
            @foreach ($rooms as $room)
                <div
                    class="max-w-sm mx-auto bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-500 hover:scale-105 hover:shadow-2xl animate-fadeInUp">

                    <!-- Room Image -->
                    @if ($room->image)
                        <img class="w-full h-56 object-cover transition-transform duration-700 ease-in-out hover:scale-110"
                            src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}">
                    @else
                        <div class="w-full h-56 flex items-center justify-center bg-gray-200 text-gray-500">No Image</div>
                    @endif

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Title -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $room->name }}</h3>

                        <!-- Features -->
                        <div class="flex items-center gap-6 text-gray-600 text-sm mb-6">
                            <div class="flex items-center gap-2">
                                <!-- capacity icon -->
                                <svg width="30px" height="30px" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                        stroke="#CCCCCC" stroke-width="0.096"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3 18C3 15.3945 4.66081 13.1768 6.98156 12.348C7.61232 12.1227 8.29183 12 9 12C9.70817 12 10.3877 12.1227 11.0184 12.348C11.3611 12.4703 11.6893 12.623 12 12.8027C12.3107 12.623 12.6389 12.4703 12.9816 12.348C13.6123 12.1227 14.2918 12 15 12C15.7082 12 16.3877 12.1227 17.0184 12.348C19.3392 13.1768 21 15.3945 21 18V21H15.75V19.5H19.5V18C19.5 15.5147 17.4853 13.5 15 13.5C14.4029 13.5 13.833 13.6163 13.3116 13.8275C14.3568 14.9073 15 16.3785 15 18V21H3V18ZM9 11.25C8.31104 11.25 7.66548 11.0642 7.11068 10.74C5.9977 10.0896 5.25 8.88211 5.25 7.5C5.25 5.42893 6.92893 3.75 9 3.75C10.2267 3.75 11.3158 4.33901 12 5.24963C12.6842 4.33901 13.7733 3.75 15 3.75C17.0711 3.75 18.75 5.42893 18.75 7.5C18.75 8.88211 18.0023 10.0896 16.8893 10.74C16.3345 11.0642 15.689 11.25 15 11.25C14.311 11.25 13.6655 11.0642 13.1107 10.74C12.6776 10.4869 12.2999 10.1495 12 9.75036C11.7001 10.1496 11.3224 10.4869 10.8893 10.74C10.3345 11.0642 9.68896 11.25 9 11.25ZM13.5 18V19.5H4.5V18C4.5 15.5147 6.51472 13.5 9 13.5C11.4853 13.5 13.5 15.5147 13.5 18ZM11.25 7.5C11.25 8.74264 10.2426 9.75 9 9.75C7.75736 9.75 6.75 8.74264 6.75 7.5C6.75 6.25736 7.75736 5.25 9 5.25C10.2426 5.25 11.25 6.25736 11.25 7.5ZM15 5.25C13.7574 5.25 12.75 6.25736 12.75 7.5C12.75 8.74264 13.7574 9.75 15 9.75C16.2426 9.75 17.25 8.74264 17.25 7.5C17.25 6.25736 16.2426 5.25 15 5.25Z"
                                            fill="#d69e2e"></path>
                                    </g>
                                </svg>
                                <span>{{ $room->capacity }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- beds icon -->
                                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" stroke="#f1de09">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M3 5V19M3 16H21M21 19V13.2C21 12.0799 21 11.5198 20.782 11.092C20.5903 10.7157 20.2843 10.4097 19.908 10.218C19.4802 10 18.9201 10 17.8 10H11V15.7273M7 12H7.01M8 12C8 12.5523 7.55228 13 7 13C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11C7.55228 11 8 11.4477 8 12Z"
                                            stroke="#d69e2e" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                <span>{{ $room->beds }} </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <!-- price icon -->
                                <svg fill="#d69e2e" height="30px" width="30px" version="1.1" id="Capa_1"
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
                                <span>Rs {{ $room->price }} / night</span>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-between">
                            <button onclick="window.location='{{ route('booking.create', $room->id) }}'"
                                class="px-4 py-2 inline-flex items-center gap-3 bg-brand-brown/90 backdrop-blur-lg border border-alfan-orange/30 rounded-full text-brand-sun hover:bg-brand-brown hover:text-white transition-all duration-300 transform hover:scale-105">
                                BOOK NOW
                            </button>
                            <button onclick="window.location='{{ route('rooms.show', $room->id) }}'"
                                class="px-4 py-2 border border-brand-brown text-brand-brown text-sm font-medium rounded-full hover:bg-brand-brown hover:text-white transition-all duration-300 transform hover:scale-105">
                                VIEW DETAILS
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <style>
        /* Simple fade-in-up animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
@endsection
