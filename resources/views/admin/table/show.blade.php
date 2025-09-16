@extends('admin.dashboard')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative mb-8">
            <!-- Close Button -->
            <a href="{{ route('admin.table.index') }}"
                class="absolute top-0 right-0 bg-white p-2 rounded-full shadow-lg hover:shadow-xl transform transition-all duration-200 hover:-translate-y-1 hover:scale-105">
                <svg class="w-8 h-8 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>

            <!-- Delete Button -->
            <form action="{{ route('admin.table.destroy', $table->id) }}" method="POST" class="absolute top-0 right-16">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-white p-2 rounded-full shadow-lg hover:shadow-xl transform transition-all duration-200 hover:-translate-y-1 hover:scale-105 "
                    onclick="return confirm('Are you sure you want to delete this booking?')">
                    <svg class="w-8 h-8 text-gray-600 hover:text-red-600" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </form>

            <!-- Header -->
            <div class="pb-4 space-y-2">
                <h1
                    class="text-3xl font-bold text-gray-800 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Table Booking Details
                </h1>
                <p class="text-gray-500 text-sm font-medium">
                    <svg class="w-4 h-4 inline-block mr-1 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Booked {{ $table->created_at->diffForHumans() }}
                </p>
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
            <div class="h-2 bg-gradient-to-r from-blue-500 to-purple-600"></div>

            <div class="p-8 space-y-8">
                <!-- Room Info -->
                {{-- <div class="space-y-4">
                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Room Information
                </h3>
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Room Name</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $booking->room->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Type</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $booking->room->type }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Capacity</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $booking->room->capacity }} people</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Beds</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $booking->room->beds }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Price</p>
                            <p class="text-lg font-semibold text-gray-900">Rs {{ number_format($booking->room->price, 2) }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-sm font-medium text-gray-500">Description</p>
                            <p class="text-lg text-gray-900">{{ $booking->room->description ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div> --}}

                <!-- Guest Info -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Guest Information
                    </h3>
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Full Name</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $table->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Email Address</p>
                                <p class="text-lg font-semibold text-gray-900 break-all">{{ $table->email }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Phone Number</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $table->phone }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">No. of People</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $table->guests }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Date</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($table->date)->format('F j, Y') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Time</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ \Carbon\Carbon::parse($table->time)->format('g:i A') }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Pickup Service</p>
                                <p class="text-lg font-semibold text-gray-900">
                                    {{ $table->pickup ? 'Yes, Required' : 'No' }}
                                </p>
                            </div>

                            @if ($table->pickup_location)
                                <div class="md:col-span-2">
                                    <p class="text-sm font-medium text-gray-500">Pickup Details</p>
                                    <p class="text-lg text-gray-900">{{ $table->pickup_location }}</p>
                                </div>
                            @endif
                            @if ($table->requests)
                                <div class="md:col-span-2">
                                    <p class="text-sm font-medium text-gray-500">Special Request</p>
                                    <p class="text-lg text-gray-900 whitespace-pre-line">{{ $table->requests }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
