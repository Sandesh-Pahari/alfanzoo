
<section class="w-full bg-alfan-white py-16 px-10 ">
    <div class="max-w-[85%] mx-auto flex flex-col md:flex-row gap-10 items-stretch">

        <!-- Left Side: Book a Table -->
        <div class="relative flex-1 bg-white rounded-2xl shadow-2xl overflow-hidden md:flex scroll-reveal-left">

            <!-- Left Content -->
            <div class="relative z-10 px-10 flex flex-col justify-center text-center md:text-left h-full md:w-1/2">
                <!-- Decorative gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-brand-aqua/10 to-brand-sky/10 pointer-events-none"></div>
                <h2 class="text-4xl md:text-4xl font-extrabold text-teal-600 mb-6 drop-shadow-md inner-reveal">
                    Book Table
                </h2>

                <div class="relative z-10">
                    <p class="text-lg md:text-xl text-alfan-black/90 max-w-lg mx-auto md:mx-0 mb-8 leading-relaxed inner-reveal">
                        Experience <span class="font-semibold text-alfan-green">world-class dining</span> in the heart of
                        nature.
                        Reserve your spot for an <span class="italic text-brand-sky">unforgettable meal</span>
                        surrounded by wildlife and serenity.
                    </p>
                    <a href="{{ route('table.create') }}"
                        class="inline-block bg-gradient-to-r from-brand-sky to-alfan-green hover:from-alfan-green hover:to-brand-sky text-white font-semibold px-8 py-4 rounded-full shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-2xl inner-reveal">
                        🍽 Reserve Now
                    </a>
                </div>
            </div>

            <!-- Right Image -->
            <div class="md:w-1/2 relative">
                <!-- Mobile Background -->
                <div class="md:hidden absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1000&q=80"
                        alt="AlfanZoo Dining" class="h-full w-full object-cover">
                    <div class="absolute inset-0 bg-black/40"></div>
                </div>
                <!-- Desktop Image -->
                <img src="https://www.greenwashingindex.com/wp-content/uploads/2025/05/stylish_space_saving_plant_design.jpg"
                    alt="AlfanZoo Dining Experience"
                    class="hidden md:block h-full w-full object-cover transform transition-transform duration-500 hover:scale-105">
                <div class="hidden md:block absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            </div>
        </div>

        <!-- Right Side: Weddings, Events & Conferences -->
        <div class="flex-1 bg-white rounded-2xl shadow-xl p-10 relative overflow-hidden scroll-reveal-right">
            <!-- Decorative background -->
            <div class="absolute inset-0 bg-white pointer-events-none"></div>
            <div class="relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-brown mb-6 text-center md:text-left inner-reveal">
                    Our Events and Programmes
                </h2>

                <!-- Events List -->
                <div class="space-y-4 mb-8">
                    <!-- Weddings & Celebrations -->
                    <div class="flex items-start gap-4 inner-reveal">
                        <img src="https://www.bihebazaar.com/uploads/2024/07/wedding-mandap-design-nepal.jpg"
                            alt="Weddings & Celebrations" class="w-20 h-20 object-cover rounded-xl shadow-md">
                        <div>
                            <h3 class="font-semibold text-lg text-alfan-black">Weddings & Celebrations</h3>
                            <p class="text-sm text-alfan-black/70">Host your dream wedding or celebration in a magical
                                setting surrounded by nature and wildlife.</p>
                        </div>
                    </div>

                    <!-- Cultural & Festival Events -->
                    <div class="flex items-start gap-4 inner-reveal">
                        <img src="https://ichef.bbci.co.uk/images/ic/1200xn/p073zc9m.jpg"
                            alt="Cultural & Festival Events" class="w-20 h-20 object-cover rounded-xl shadow-md">
                        <div>
                            <h3 class="font-semibold text-lg text-alfan-black">Cultural & Festival Events</h3>
                            <p class="text-sm text-alfan-black/70">Celebrate cultural traditions, music, and festivals
                                with vibrant programs and lively gatherings.</p>
                        </div>
                    </div>

                    <!-- Meetings & Conferences -->
                    <div class="flex items-start gap-4 inner-reveal">
                        <img src="https://pix10.agoda.net/hotelImages/8803651/-1/0f08448399f51d65c49e39ac66952c40.jpg?ca=9&ce=1&s=414x232"
                            alt="Meetings & Conferences" class="w-20 h-20 object-cover rounded-xl shadow-md">
                        <div>
                            <h3 class="font-semibold text-lg text-alfan-black">Meetings & Conferences</h3>
                            <p class="text-sm text-alfan-black/70">Plan professional meetings and conferences in a
                                refreshing environment away from the ordinary.</p>
                        </div>
                    </div>
                </div>

                <!-- Enquiry Button -->
                <div class="text-center md:text-left inner-reveal">
                    <a href="{{ route('contact') }}"
                        class="inline-block bg-brand-gold hover:bg-alfan-orange-dark text-white font-semibold px-6 py-3 rounded-full shadow-md transition-transform hover:scale-105">
                        Enquire Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ScrollReveal Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sr = ScrollReveal({
            reset: false,           // Replay animation on scroll back
            distance: '60px',      // Slide distance
            duration: 1500,        // Animation duration
            delay: 100,            // Base delay
            easing: 'ease-in-out',
            mobile: true
        });

        // Left Card (Book Table)
        sr.reveal('.scroll-reveal-left', {
            origin: 'left',
            delay: 100
        });

        // Right Card (Events)
        sr.reveal('.scroll-reveal-right', {
            origin: 'right',
            delay: 200
        });

        // Inner staggered elements (headings, text, buttons, list items)
        sr.reveal('.inner-reveal', {
            origin: 'bottom',
            interval: 200,
            scale: 0.95
        });
    });
</script>
