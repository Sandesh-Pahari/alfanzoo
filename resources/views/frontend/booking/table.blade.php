@extends('template.template')

@section('pagecontent')
<div class="min-h-screen bg-gradient-to-br from-alfan-white via-white to-brand-sun/10 py-20 px-6">
    <div class="max-w-3xl mx-auto">

        <!-- Global Success / Error -->
        @if(session('success'))
            <div id="booking-success" class="mb-8 bg-alfan-green/20 border border-alfan-green-dark text-alfan-green-dark px-6 py-4 rounded-2xl shadow-lg flex items-center gap-3">
                <span class="text-xl">✅</span>
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-8 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl shadow-sm">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validation errors list -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-2xl">
                <strong class="block mb-2">Please fix the following:</strong>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white shadow-2xl rounded-3xl border border-brand-gold/30 p-10">
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-alfan-green text-white rounded-3xl flex items-center justify-center mx-auto text-3xl mb-4">
                    🍽️
                </div>
                <h1 class="text-4xl font-black text-alfan-black">Reserve Your Table</h1>
                <p class="text-brand-brown mt-2">Plan your dining experience in advance</p>
            </div>

            <form action="{{ route('table.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-alfan-black font-bold mb-2">Full Name</label>
                    <input type="text" name="name" required value="{{ old('name') }}"
                        class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-alfan-green focus:ring-2 focus:ring-alfan-green-light transition-all bg-alfan-white text-brand-brown">
                    @error('name') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-alfan-black font-bold mb-2">Email</label>
                    <input type="email" name="email" required value="{{ old('email') }}"
                        class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-alfan-green focus:ring-2 focus:ring-alfan-green-light transition-all bg-alfan-white text-brand-brown">
                    @error('email') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-alfan-black font-bold mb-2">Phone Number</label>
                    <input type="tel" name="phone" required value="{{ old('phone') }}"
                        class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-alfan-orange focus:ring-2 focus:ring-alfan-orange-light transition-all bg-alfan-white text-brand-brown">
                    @error('phone') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Guests -->
                <div>
                    <label class="block text-alfan-black font-bold mb-2">Number of Guests</label>
                    <input type="number" name="guests" min="1" max="20" required value="{{ old('guests', 1) }}"
                        class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-brand-gold focus:ring-2 focus:ring-brand-gold transition-all bg-alfan-white text-brand-brown">
                    @error('guests') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Date & Time -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-alfan-black font-bold mb-2">Date</label>
                        <input type="date" name="date" required value="{{ old('date') }}"
                            class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-alfan-green focus:ring-2 focus:ring-alfan-green-light transition-all bg-alfan-white text-brand-brown">
                        @error('date') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-alfan-black font-bold mb-2">Time</label>
                        <input type="time" name="time" required value="{{ old('time') }}"
                            class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-alfan-green focus:ring-2 focus:ring-alfan-green-light transition-all bg-alfan-white text-brand-brown">
                        @error('time') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Pickup Option (Checkbox) -->
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="pickup" name="pickup" value="1"
                        class="w-5 h-5 text-alfan-green border-gray-300 rounded focus:ring-alfan-green"
                        {{ old('pickup') ? 'checked' : '' }}>
                    <label for="pickup" class="text-alfan-black font-bold">I need pickup service</label>
                </div>

                <!-- Pickup Location (Hidden until checked) -->
                <div id="pickup-location" class="{{ old('pickup') ? '' : 'hidden' }}">
                    <label class="block text-alfan-black font-bold mb-2">Pickup Location</label>
                    <input type="text" name="pickup_location" value="{{ old('pickup_location') }}"
                        class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-brand-sky focus:ring-2 focus:ring-brand-sky transition-all bg-alfan-white text-brand-brown">
                    <p class="mt-2 text-sm text-alfan-green-dark">🚖 Pickup is free of charge.</p>
                    @error('pickup_location') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Special Requests -->
                <div>
                    <label class="block text-alfan-black font-bold mb-2">Special Requests</label>
                    <textarea name="requests" rows="4"
                        class="w-full px-5 py-4 rounded-2xl border border-brand-sun/40 focus:border-brand-sky focus:ring-2 focus:ring-brand-sky transition-all bg-alfan-white text-brand-brown">{{ old('requests') }}</textarea>
                    @error('requests') <p class="text-red-600 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="flex justify-center gap-4 pt-6">
                    <button type="submit"
                        class="px-8 py-4 bg-alfan-green text-white rounded-2xl font-bold shadow-lg hover:bg-alfan-green-dark hover:scale-105 transition-all">
                        Submit Booking
                    </button>
                    <button type="button" onclick="window.history.back()"
                        class="px-8 py-4 bg-gray-300 text-alfan-black rounded-2xl font-bold shadow-lg hover:bg-gray-400 hover:scale-105 transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="mt-12 text-center">
            <p class="text-brand-brown text-lg font-medium">📞 Need help with booking?</p>
            <p class="mt-2 text-brand-brown">You can reach us via:</p>
            <div class="flex justify-center gap-6 mt-4">
                <a href="mailto:info@resort.com" class="text-alfan-green-dark font-bold hover:underline">Email</a>
                <a href="https://wa.me/1234567890" target="_blank" class="text-alfan-orange font-bold hover:underline">WhatsApp</a>
                <a href="tel:+1234567890" class="text-brand-sky font-bold hover:underline">Phone</a>
            </div>
            <div class="mt-6">
                <a href="{{ route('contact') }}" class="inline-block px-6 py-3 bg-brand-gold text-white font-bold rounded-2xl shadow-md hover:bg-brand-sun transition-all">
                    Go to Contact Us Page
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Pickup Toggle & Success auto-hide Script -->
<script>
    (function () {
        const pickupCheckbox = document.getElementById('pickup');
        const pickupLocation = document.getElementById('pickup-location');

        if (pickupCheckbox) {
            pickupCheckbox.addEventListener('change', function () {
                pickupLocation.classList.toggle('hidden', !this.checked);
            });
        }

        // Auto-hide success message after 10 seconds
        const successEl = document.getElementById('booking-success');
        if (successEl) {
            setTimeout(function () {
                // graceful fade + remove
                successEl.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                successEl.style.opacity = '0';
                successEl.style.transform = 'translateY(-10px)';
                setTimeout(() => { if (successEl && successEl.parentNode) successEl.parentNode.removeChild(successEl); }, 500);
            }, 10000); // 10000 ms = 10s
        }
    })();
</script>
@endsection
