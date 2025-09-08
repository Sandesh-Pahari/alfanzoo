@extends('admin.dashboard')

@section('content')


<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center mb-8">
        <div class="sm:flex-auto">
            <h1 class="text-2xl font-bold text-gray-900">Room Booking</h1>
            <p class="mt-2 text-sm text-gray-600">Manage Booking for all Rooms</p>
        </div>
    </div>

    @if(session('success'))
        <div class="flex items-center bg-emerald-50 text-emerald-700 px-4 py-3 rounded-lg mb-6 border border-emerald-100">
            <svg class="h-5 w-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span class="text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th scope="col" class="pl-6 pr-3 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Guests</th>
                        <th scope="col" class="px-3 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Room</th>
                        <th scope="col" class="px-3 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-3 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($bookings as $booking)
                    <tr class="hover:bg-gray-50 transition-colors duration-150 cursor-pointer group" onclick="window.location='{{ route('admin.booking.show', $booking->id) }}'">
                        <td class="pl-6 pr-3 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $booking->name }}</div>
                                    <div class="text-xs text-gray-500 mt-1">{{ $booking->created_at->format('M d, Y h:i A') }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $booking->room->name }}</div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($booking->is_read)
                                    <div class="flex items-center px-4 py-2 rounded-full bg-green-50 border border-green-200">
                                        <div class="h-3 w-3 rounded-full bg-green-500 mr-2"></div>
                                        <span class="text-sm font-medium text-green-600">Reviewed</span>
                                    </div>
                                @else
                                    <div class="flex items-center px-4 py-2 rounded-full bg-blue-50 border border-blue-200 animate-pulse">
                                        <div class="h-3 w-3 rounded-full bg-blue-500 mr-2"></div>
                                        <span class="text-sm font-medium text-blue-600">New booking</span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-3 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="event.stopPropagation(); return confirm('Are you sure?')"
                                         class="text-red-600 hover:text-red-800 hover:bg-red-100 p-2 rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center space-y-3">
                                <svg class="w-16 h-16 text-gray-200 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                                <p class="text-gray-400 text-sm">No Bookings found</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($bookings->hasPages())
            <div class="border-t border-gray-100 px-6 py-4">
                <nav class="flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        Showing {{ $bookings->firstItem() }} - {{ $bookings->lastItem() }} of {{ $bookings->total() }}
                    </div>
                    <div class="flex space-x-2">
                        @foreach ($bookings->links()->elements as $element)
                            @if(is_array($element))
                                @foreach ($element as $page => $url)
                                    @if($page == $bookings->currentPage())
                                        <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-lg text-sm font-medium">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}" class="px-3 py-1 text-gray-600 hover:bg-gray-50 rounded-lg text-sm font-medium transition-colors duration-150">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </nav>
            </div>
        @endif
    </div>
</div>
@endsection