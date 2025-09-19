@extends('template.template')
@section('pagecontent')
    <section class="px-6 md:px-12 lg:px-20 bg-brand-sun/10 relative mt-20 py-10">
        <h1 class="text-4xl text-center md:text-5xl font-bold mb-6 text-brand-brown">
            About Us
        </h1>
        <div class="container mx-auto mt-10">

            {{-- Top right corner buttons (only for authenticated users) --}}
            @auth
                <div class="absolute top-4 right-4">
                    @if ($about)
                        <a href="{{ route('about.edit', $about->id) }}"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                            Edit
                        </a>
                    @else
                        <a href="{{ route('about.create') }}"
                            class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                            Create
                        </a>
                    @endif
                </div>
            @endauth

            <div class="flex flex-col lg:flex-row items-center justify-between gap-14">

                <!-- Image Section -->
                <div class="w-full lg:w-1/2 reveal">
                    <div class="relative">
                        <div class="rounded-2xl overflow-hidden shadow-2xl floating">
                            <img src="{{ $about && $about->image ? asset('storage/' . $about->image) : 'https://via.placeholder.com/600x400' }}"
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

                    <!-- Feature Items (Optional dynamic loop later) -->


                    <button
                        class="px-8 py-3 bg-brand-gold text-white rounded-full font-semibold shadow-md hover:bg-brand-brown transition-all transform hover:-translate-y-1">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </section>

        <!-- Our Team Section -->
        <section class="py-12 md:py-16 lg:py-20 px-4 bg-gradient-to-b from-orange-50 to-white" id="team-section">
            <div class="max-w-[80%] mx-auto">
                <!-- Section Header with Create Button -->
                <div class="text-center mb-12 md:mb-16 relative scroll-reveal">
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                        <span class="inline-block px-4 py-2 bg-orange-100 text-orange-600 rounded-full text-sm font-semibold mb-4 md:mb-0 animate-reveal-up">Meet the Experts</span>
                        @auth
                            <a href="{{ route('ourteam.create') }}"
                                class="flex items-center px-5 py-2 bg-pastry-primary hover:bg-orange-600 text-white rounded-full transition-all duration-300 shadow-md hover:shadow-lg animate-bounce-in"
                                style="animation-delay: 0.2s">
                                <i class="fas fa-plus mr-2"></i> Add Team Member
                            </a>
                        @endauth
                    </div>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-pastry-primary mb-4 animate-reveal-up">Our <span
                            class="text-pastry-secondary">Team</span></h2>
                    <p class="text-gray-600 max-w-2xl mx-auto text-base md:text-lg animate-reveal-up" style="animation-delay: 0.2s">
                        Learn from the best in the industry. Our team of award-winning pastry chefs and bakers bring decades of
                        experience to our classrooms.
                    </p>
                </div>

                <!-- Team Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                    @forelse($teamMembers as $index => $member)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group relative scroll-reveal"
                            style="transition-delay: {{ $index * 0.1 }}s">
                            <!-- Admin Controls (Edit/Delete) -->
                            @auth
                                <div
                                    class="absolute top-4 right-4 z-10 flex space-x-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <a href="{{ route('ourteam.edit', $member->id) }}"
                                        class="w-8 h-8 flex items-center justify-center bg-white text-orange-500 rounded-full shadow-md hover:bg-orange-50 transition-all animate-bounce-in"
                                        style="animation-delay: 0.2s">
                                        <i class="fas fa-pencil-alt text-sm"></i>
                                    </a>
                                    <form action="{{ route('ourteam.destroy', $member->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this team member?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-8 h-8 flex items-center justify-center bg-white text-red-500 rounded-full shadow-md hover:bg-red-50 transition-all animate-bounce-in"
                                            style="animation-delay: 0.3s">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            @endauth

                            <div class="relative overflow-hidden h-64 md:h-72 lg:h-80">
                                <img src="{{ $member->image_path ? asset('storage/' . $member->image_path) : asset('images/default-team-member.jpg') }}"
                                    loading="lazy" alt="{{ $member->name }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                                <!-- Modified gradient - lighter at top, stronger at bottom -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/30"></div>
                                <div class="absolute bottom-0 left-0 p-4 md:p-6">
                                    <h3 class="text-xl md:text-2xl font-bold text-orange-400 drop-shadow-md">{{ $member->name }}</h3>
                                    <p class="font-bold text-white drop-shadow-md text-sm md:text-base">{{ $member->position }}</p>
                                </div>
                            </div>
                            <div class="p-4 md:p-6">
                                <p class="text-orange-800 mb-4 text-sm md:text-base">{{ $member->bio }}</p>
                                <div class="flex justify-between items-center">
                                    <div class="flex space-x-4">
                                        @if ($member->social_instagram)
                                            <a href="{{ $member->social_instagram }}"
                                                aria-label="{{ $member->name }}'s Instagram"
                                                class="text-orange-500 hover:text-orange-600 transition-colors animate-reveal-up"
                                                style="animation-delay: 0.3s">
                                                <i class="fab fa-instagram text-lg md:text-xl"></i>
                                            </a>
                                        @endif
                                        @if ($member->social_facebook)
                                            <a href="{{ $member->social_facebook }}"
                                                aria-label="{{ $member->name }}'s Twitter"
                                                class="text-orange-500 hover:text-orange-600 transition-colors animate-reveal-up"
                                                style="animation-delay: 0.4s">
                                                <i class="fab fa-facebook text-lg md:text-xl"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12 animate-reveal-up">
                            <p class="text-gray-500 text-lg">No team members found</p>
                            @auth
                                <a href="{{ route('ourteam.create') }}"
                                    class="mt-4 inline-flex items-center px-5 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-full transition-all duration-300 shadow-md hover:shadow-lg animate-bounce-in">
                                    <i class="fas fa-plus mr-2"></i> Add Your First Team Member
                                </a>
                            @endauth
                        </div>
                    @endforelse
                </div>
            </div>
        </section>


    {{-- Animations --}}
    {{-- <style>
        /* Scroll Reveal Animation */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.9s ease-in-out;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Floating Animation */
        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* Feature Item Hover */
        .feature-item:hover {
            transform: translateX(12px);
            transition: transform 0.3s ease;
        }
    </style> --}}

    {{-- <script>
        // Scroll Reveal JS
        document.addEventListener("scroll", () => {
            document.querySelectorAll(".reveal").forEach((el) => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight - 100) {
                    el.classList.add("active");
                }
            });
        });
    </script> --}}
@endsection
