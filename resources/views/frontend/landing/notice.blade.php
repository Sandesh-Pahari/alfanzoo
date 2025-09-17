@if($notice)
<div 
    x-data="{ open: false }"
    x-init="
        if (!sessionStorage.getItem('notice_shown')) {
            open = true;
            sessionStorage.setItem('notice_shown', 'true');
        }
    "
    x-show="open"
    class="fixed inset-0 flex items-center justify-center z-50"
>
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="open = false"></div>

    <!-- Notice Card -->
    <div 
        class="bg-white rounded-2xl shadow-2xl w-11/12 max-w-3xl relative z-10 overflow-hidden flex flex-col md:flex-row"
        x-transition
    >
        <!-- Left Image -->
        @if($notice->image)
            <div class="md:w-1/2 w-full">
                <img src="{{ asset('storage/'.$notice->image) }}" alt="Notice Image" class="h-full w-full object-cover">
            </div>
        @endif

        <!-- Right Content -->
        <div class="md:w-1/2 w-full p-8 flex flex-col justify-between">
            <!-- Close Button -->
            <button @click="open = false" class="absolute top-4 right-4 text-gray-500 hover:text-red-500">✕</button>

            <div>
                <h2 class="text-2xl font-bold text-teal-600 mb-3">📢 {{ $notice->title }}</h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($notice->message)) !!}
                </p>
            </div>

            <!-- Action Button -->
            <div class="mt-6 text-right">
                <button @click="open = false"
                    class="bg-teal-600 hover:bg-orange-700 text-white px-6 py-2 rounded-xl shadow transition">
                    Got it
                </button>
            </div>
        </div>
    </div>
</div>
@endif
