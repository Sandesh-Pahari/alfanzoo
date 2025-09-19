<section id="about" class=" px-6 bg-[#f9f7ed] relative py-20 ">
    <div class="max-w-[85%] mx-auto">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-14">
            
            <!-- Image Section -->
            <div class="w-full lg:w-1/2 reveal">
                <div class="relative">
                    <div class="rounded-2xl overflow-hidden shadow-2xl floating">
                        <img src="{{ $about && $about->image ? asset('storage/'.$about->image) : 'https://via.placeholder.com/600x400' }}" 
                             alt="About Us" class="w-full h-auto">
                    </div>
                    <!-- Decorative Shapes -->
                    <div class="absolute -bottom-8 -left-8 w-32 h-32 rounded-full bg-brand-sun opacity-70 z-[-1]"></div>
                    <div class="absolute -top-8 -right-8 w-28 h-28 rounded-full bg-brand-sky opacity-70 z-[-1]"></div>
                </div>
            </div>
            
            <!-- Content Section -->
            <div class="w-full lg:w-1/2 reveal">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-brand-brown">
                    {{ $about?->title ?? 'About Us Title' }}
                </h1>
                <p class="text-lg text-gray-700 mb-10 leading-relaxed">
                    {{ $about?->description ?? 'Write about your company here...' }}
                </p>

                <button class="px-8 py-3 bg-brand-gold text-white rounded-full font-semibold shadow-md hover:bg-brand-brown transition-all transform hover:-translate-y-1">
                    Learn More
                </button>
            </div>
        </div>
    </div>
</section>

<style>
    /* Floating Animation */
.floating {
    animation: float 6s ease-in-out infinite;
}
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
}

/* Feature Item Hover */
.feature-item:hover {
    transform: translateX(12px);
    transition: transform 0.3s ease;
}

</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize ScrollReveal
        const sr = ScrollReveal({
            reset: false,           // replay on scroll back
            distance: '60px',      // slide distance
            duration: 1600,        // animation time (ms)
            delay: 100,            // base delay
            easing: 'ease-in-out', // smooth transition
            mobile: true
        });

        // Reveal image from left
        sr.reveal('.reveal:nth-child(1)', {
            origin: 'left',
            delay: 200,
        });

        // Reveal content from right
        sr.reveal('.reveal:nth-child(2)', {
            origin: 'right',
            delay: 300,
        });
    });
</script>
