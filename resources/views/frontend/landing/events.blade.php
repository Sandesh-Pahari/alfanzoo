<section class="w-full bg-alfan-white py-12 px-4 sm:px-6 lg:px-12 xl:px-16">
    <div
        class="max-w-[95%] sm:max-w-[90%] lg:max-w-[85%] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-10 items-stretch">

        <!-- Left Side: Book a Table -->
        <div
            class="relative bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col lg:flex-row scroll-reveal-left">

            <!-- Left Content -->
            <div
                class="relative z-10 px-4 sm:px-6 md:px-8 py-8 flex flex-col justify-center text-center lg:text-left h-full lg:w-1/2">
                <!-- Decorative gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-br from-brand-aqua/10 to-brand-sky/10 pointer-events-none">
                </div>

                <h2
                    class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-teal-600 mb-4 drop-shadow-md inner-reveal">
                    Book Table
                </h2>

                <p
                    class="text-sm sm:text-base md:text-lg lg:text-xl text-alfan-black/90 max-w-lg mx-auto lg:mx-0 mb-6 leading-relaxed inner-reveal">
                    Experience <span class="font-semibold text-alfan-green">world-class dining</span> in the heart of
                    nature. Reserve your spot for an <span class="italic text-brand-sky">unforgettable meal</span>
                    surrounded by wildlife and serenity.
                </p>

                <a href="{{ route('table.create') }}"
                    class="inline-flex items-center justify-center bg-gradient-to-r from-brand-sky to-alfan-green 
          hover:from-alfan-green hover:to-brand-sky text-white font-semibold 
          px-3 sm:px-4 py-2 rounded-full shadow-lg 
          transform transition-all duration-300 hover:scale-110 hover:shadow-2xl inner-reveal 
          text-sm sm:text-base md:text-lg">
                    🍽 <span class="ml-1">Reserve</span>
                </a>

            </div>
            

            <!-- Right Image (hidden on small & medium screens) -->
            <div class="hidden lg:block lg:w-1/2 relative">
                <img src="https://www.greenwashingindex.com/wp-content/uploads/2025/05/stylish_space_saving_plant_design.jpg"
                    alt="AlfanZoo Dining Experience"
                    class="w-full h-full object-cover transform transition-transform duration-500 hover:scale-105 rounded-b-2xl lg:rounded-b-none lg:rounded-r-2xl">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent lg:rounded-r-2xl rounded-b-2xl">
                </div>
            </div>
        </div>

        <!-- Right Side: Weddings, Events & Conferences -->
        <div class="bg-white rounded-2xl shadow-xl p-5 sm:p-6 md:p-8 relative overflow-hidden scroll-reveal-right">
            <div class="relative z-10">
                <h2
                    class="text-2xl sm:text-3xl md:text-4xl font-bold text-brand-brown mb-5 text-center lg:text-left inner-reveal">
                    Our Events and Programmes
                </h2>

                <!-- Events List -->
                <div class="space-y-4 mb-6">
                    <!-- Weddings & Celebrations -->
                    <div class="flex items-start gap-3 inner-reveal">
                        <img src="https://www.bihebazaar.com/uploads/2024/07/wedding-mandap-design-nepal.jpg"
                            alt="Weddings & Celebrations"
                            class="w-14 h-14 sm:w-16 sm:h-16 md:w-18 md:h-18 object-cover rounded-xl shadow-md">
                        <div>
                            <h3 class="font-semibold text-base sm:text-lg text-alfan-black">Weddings & Celebrations</h3>
                            <p class="text-sm sm:text-base text-alfan-black/70">Host your dream wedding or celebration
                                in a magical
                                setting surrounded by nature and wildlife.</p>
                        </div>
                    </div>

                    <!-- Cultural & Festival Events -->
                    <div class="flex items-start gap-3 inner-reveal">
                        <img src="https://ichef.bbci.co.uk/images/ic/1200xn/p073zc9m.jpg"
                            alt="Cultural & Festival Events"
                            class="w-14 h-14 sm:w-16 sm:h-16 md:w-18 md:h-18 object-cover rounded-xl shadow-md">
                        <div>
                            <h3 class="font-semibold text-base sm:text-lg text-alfan-black">Cultural & Festival Events
                            </h3>
                            <p class="text-sm sm:text-base text-alfan-black/70">Celebrate cultural traditions, music,
                                and festivals
                                with vibrant programs and lively gatherings.</p>
                        </div>
                    </div>

                    <!-- Meetings & Conferences -->
                    <div class="flex items-start gap-3 inner-reveal">
                        <img src="https://pix10.agoda.net/hotelImages/8803651/-1/0f08448399f51d65c49e39ac66952c40.jpg?ca=9&ce=1&s=414x232"
                            alt="Meetings & Conferences"
                            class="w-14 h-14 sm:w-16 sm:h-16 md:w-18 md:h-18 object-cover rounded-xl shadow-md">
                        <div>
                            <h3 class="font-semibold text-base sm:text-lg text-alfan-black">Meetings & Conferences</h3>
                            <p class="text-sm sm:text-base text-alfan-black/70">Plan professional meetings and
                                conferences in a
                                refreshing environment away from the ordinary.</p>
                        </div>
                    </div>
                </div>

                <!-- Enquiry Button -->
                <div class="text-center lg:text-left inner-reveal">
                    <a href="{{ route('contact') }}"
                        class="inline-block bg-brand-gold hover:bg-alfan-orange-dark text-white font-semibold px-5 sm:px-6 py-3 rounded-full shadow-md transition-transform hover:scale-105 text-sm sm:text-base md:text-lg">
                        Enquire Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ScrollReveal Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sr = ScrollReveal({
            reset: true,
            distance: '60px',
            duration: 1500,
            delay: 100,
            easing: 'ease-in-out',
            mobile: true
        });

        sr.reveal('.scroll-reveal-left', {
            origin: 'left',
            delay: 100
        });
        sr.reveal('.scroll-reveal-right', {
            origin: 'right',
            delay: 200
        });
        sr.reveal('.inner-reveal', {
            origin: 'bottom',
            interval: 200,
            scale: 0.95
        });
    });
</script>
