@extends('template.template')

@section('pagecontent')
<div class="min-h-screen mt-12 flex flex-col items-center justify-start py-12 px-6">

  <div class="w-full max-w-3xl">
    <div class="bg-white rounded-2xl shadow-lg border border-orange-200 p-6 md:p-8 relative overflow-hidden">

      <!-- Dynamic Title -->
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        Booking for: <span class="text-orange-600">{{ $room->name }}</span>
      </h2>

      <form id="bookingForm" action="{{ route('booking.store') }}" method="POST"
            class="grid grid-cols-1 md:grid-cols-2 gap-5 relative z-10">
        @csrf

        {{-- Success / Errors --}}
        @if(session('success'))
          <div class="md:col-span-2 bg-green-50 border border-green-200 text-green-700 p-3 rounded">
            {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="md:col-span-2 bg-red-50 border border-red-200 text-red-700 p-3 rounded">
            <ul class="list-disc pl-5">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Hidden Room ID -->
  <input type="hidden" name="room_id" value="{{ old('room_id', $room->id) }}">

        <!-- Name -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
          <input type="text" name="name" value="{{ old('name') }}" required
                 class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>

        <!-- Phone -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
          <input type="tel" name="phone" value="{{ old('phone') }}" required
                 class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required
                 class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>

        <!-- People -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">No. of People</label>
          <input type="number" name="no_of_people" value="{{ old('no_of_people') }}" min="1" required
                 class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>

        <!-- Room Name (readonly visible) -->
        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-2">Room Selected</label>
          <input type="text" value="{{ $room->name }}" readonly
                 class="w-full rounded-xl border border-orange-200 bg-gray-100 px-4 py-3.5 shadow-sm cursor-not-allowed">
        </div>

        <!-- Check-in -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Check-in</label>
          <input type="date" name="check_in" value="{{ old('check_in') }}" required
                 class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>

        <!-- Check-out -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">Check-out</label>
          <input type="date" name="check_out" value="{{ old('check_out') }}" required
                 class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none">
        </div>

        <!-- Special Request -->
        <div class="md:col-span-2">
          <label class="block text-sm font-semibold text-gray-700 mb-2">Special Request</label>
          <textarea name="special_request" rows="3"
                    class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none"
                    placeholder="Eg: late check-in, birthday decoration...">{{ old('special_request') }}</textarea>
        </div>

        <!-- Pickup -->
        <div class="md:col-span-2">
          <p class="text-sm font-semibold text-gray-700 mb-3">Pickup Service</p>
          <label class="inline-flex items-center mr-6">
            <input type="radio" name="pickup" value="yes" class="text-orange-500 focus:ring-orange-400" id="pickupYes" {{ old('pickup') == 'yes' ? 'checked' : '' }}>
            <span class="ml-2">Yes</span>
          </label>
          <label class="inline-flex items-center">
            <input type="radio" name="pickup" value="no" class="text-orange-500 focus:ring-orange-400" id="pickupNo" {{ old('pickup', 'no') == 'no' ? 'checked' : '' }}>
            <span class="ml-2">No</span>
          </label>
        </div>

        <!-- Pickup Details -->
        <div id="pickupDetails" class="md:col-span-2 {{ old('pickup') == 'yes' ? '' : 'hidden' }}">
          <label class="block text-sm font-semibold text-gray-700 mb-2">Pickup Location</label>
          <input type="text" name="pickup_details" value="{{ old('pickup_details') }}"
           class="w-full rounded-xl border border-orange-200 px-4 py-3.5 shadow-sm focus:ring-2 focus:ring-orange-400 focus:outline-none"
           placeholder="If yes, please specify the pickup location">
        </div>

        <script>
          document.addEventListener('DOMContentLoaded', function () {
            const pickupYes = document.getElementById('pickupYes');
            const pickupNo = document.getElementById('pickupNo');
            const pickupDetails = document.getElementById('pickupDetails');

            pickupYes.addEventListener('change', function () {
              if (pickupYes.checked) {
          pickupDetails.classList.remove('hidden');
              }
            });

            pickupNo.addEventListener('change', function () {
              if (pickupNo.checked) {
          pickupDetails.classList.add('hidden');
              }
            });
          });
        </script>



        <!-- Submit -->
        <div class="md:col-span-2 flex justify-center mt-6 space-x-4">
          <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold px-10 py-4 rounded-xl shadow-md transition">
            Submit Booking
          </button>
          <button type="button" onclick="window.history.back();"
            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-10 py-4 rounded-xl shadow-md transition">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
