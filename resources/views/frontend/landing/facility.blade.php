<section class="py-2 bg-alfan-white">
    <div class="max-w-[85%] mx-auto px-6 lg:px-8">
        <!-- Heading -->
        <div class="text-center mb-12 scroll-reveal-heading">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-brand-brown">
                Our Facilities
            </h1>
            <p class="mt-4 text-gray-600">Experience comfort and luxury with our premium facilities.</p>
        </div>

        <!-- Facilities Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 md:gap-8">
            
            <!-- Swimming Pool -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/swimming-pool.png')}}" alt="Swimming Pool"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Swimming Pool</h3>
                <p class="text-gray-600 text-sm">Relax and refresh in our clean, spacious pool.</p>
            </div>

            <!-- Cozy Room -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/bed.png')}}" alt="Cozy Room"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Cozy Rooms</h3>
                <p class="text-gray-600 text-sm">Stay comfortably in our modern and cozy rooms.</p>
            </div>

            <!-- Swings -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/swing.png')}}" alt="Swings"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Swings</h3>
                <p class="text-gray-600 text-sm">Fun swings for kids and adults to enjoy the outdoors.</p>
            </div>

            <!-- Bar -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/bar.png')}}" alt="Bar"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Bar</h3>
                <p class="text-gray-600 text-sm">Enjoy cocktails, wines, and more at our luxury bar.</p>
            </div>

            <!-- Restaurant -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/restaurant.png')}}" alt="Restaurant"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Restaurant</h3>
                <p class="text-gray-600 text-sm">Taste delicious dishes prepared by our chefs.</p>
            </div>

            <!-- Parties & Functions -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/party-baloons.png')}}" alt="Parties"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Parties & Events</h3>
                <p class="text-gray-600 text-sm">Host unforgettable group functions and parties with us.</p>
            </div>

            <!-- Parking -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/parking.png')}}" alt="Parking"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Parking</h3>
                <p class="text-gray-600 text-sm">Safe and secure parking space for all our guests.</p>
            </div>

            <!-- Lake View -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/lake.png')}}" alt="Lake View"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Lake View</h3>
                <p class="text-gray-600 text-sm">Enjoy a stunning lake view right from your stay.</p>
            </div>

            <!-- Natural Environment -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition scroll-reveal">
                <img src="{{asset('alphanzoo/facility/forest.png')}}" alt="Natural Environment"
                    class="mx-auto mb-4 w-16 h-16">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Natural Environment</h3>
                <p class="text-gray-600 text-sm">Surround yourself with greenery and fresh air.</p>
            </div>

            <!-- Pickup & Drop -->
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center transform transition duration-300 hover:scale-105 hover:shadow-2xl scroll-reveal">
                <img src="{{asset('alphanzoo/facility/car.png')}}" alt="Pickup & Drop"
                    class="mx-auto mb-4 w-16 h-16 transition-transform duration-300 group-hover:rotate-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Pickup & Drop</h3>
                <p class="text-gray-600 text-sm">Convenient pickup and drop-off service for guests.</p>
            </div>
        </div>
    </div>
</section>

<!-- ScrollReveal Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sr = ScrollReveal({
            reset: true,           // Replay animation on scroll back
            distance: '50px',      // Slide distance
            duration: 1400,        // Animation duration
            delay: 100,            // Base delay
            easing: 'ease-in-out',
            mobile: true
        });

        // Heading reveal
        sr.reveal('.scroll-reveal-heading', {
            origin: 'top',
            delay: 200,
        });

        // Facilities cards reveal (staggered)
        sr.reveal('.scroll-reveal', {
            origin: 'bottom',
            interval: 150,   // stagger timing between items
            scale: 0.95      // zoom-in effect
        });
    });
</script>
