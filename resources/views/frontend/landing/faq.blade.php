
<style>
    /* Smooth FAQ open/close */
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease;
    }

    .faq-answer.open {
        /* dynamically set max-height via JS */
    }

    /* Fade + slide effect for content */
    .faq-answer .content {
        transform: translateY(-10px);
        transition: transform 0.3s ease, padding 0.3s ease;
    }
    .faq-answer.open .content {
        transform: translateY(0);
    }

    /* Floating animations */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0px); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-delay { animation: float 6s ease-in-out infinite 1s; }
    .animate-float-delay-2 { animation: float 6s ease-in-out infinite 2s; }

    /* Highlight effect */
    .highlight-text::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 30%;
        background-color: #8BC34A33; /* soft alfan-green highlight */
        opacity: 0.4;
        z-index: -1;
        transition: height 0.3s ease, opacity 0.3s ease;
    }
    .highlight-text:hover::after {
        height: 50%;
        opacity: 0.6;
    }
</style>

<div class="min-h-screen bg-alfan-white py-12 px-4 sm:px-6 lg:px-8">
    <!-- Decorative floating elements -->
    <div class="fixed top-20 left-10 w-16 h-16 rounded-full bg-alfan-green/20 animate-float"></div>
    <div class="fixed bottom-1/3 right-20 w-24 h-24 rounded-full bg-alfan-orange/20 animate-float-delay"></div>
    <div class="fixed top-1/4 right-1/4 w-12 h-12 rounded-full bg-alfan-black/10 animate-float-delay-2"></div>

    <div class="flex items-center justify-center">
        <div class="w-full max-w-7xl">
            <!-- Header -->
            <div class="relative overflow-hidden bg-white/90 rounded-xl mb-8 shadow-lg backdrop-blur-sm">
                <div class="absolute inset-0 bg-gradient-to-r from-alfan-green/5 to-alfan-orange/5"></div>
                <div class="relative z-10 text-center py-8 px-6">
                    <h1 class="text-4xl  md:text-4xl font-bold text-brand-brown font-serif">
                        <span class="relative inline-block highlight-text">
                          FAQS of Alfanzoo Resort
                        </span>
                    </h1>
                    <div class="w-24 h-1 bg-alfan-orange mx-auto my-4 rounded-full"></div>
                    <p class="mt-4 text-lg text-alfan-green-dark max-w-2xl mx-auto">
                        Answers to all your questions about our culinary programs
                    </p>
                    @auth
                        <a href="{{ route('faqs.create') }}" class="inline-block mt-6">
                            <button
                                class="text-white font-bold px-6 py-2 bg-gradient-to-r from-alfan-green to-alfan-green-dark rounded-full hover:shadow-lg transition-all duration-300 hover:scale-105 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Add New FAQ
                            </button>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- FAQ Container -->
            <div id="faq-container" class="space-y-6">
                @foreach ($faqs as $index => $faq)
                    <div class="group">
                        <button
                          class="faq-toggle w-full flex justify-between items-center text-left p-6 text-lg font-semibold text-alfan-black bg-white focus:outline-none shadow-lg hover:shadow-xl transition-all duration-300 rounded-xl"
                          onclick="toggleAnswer('answer{{ $faq->id }}')" aria-expanded="false">

                          <!-- Left side: number + question -->
                          <div class="flex items-center flex-1 min-w-0">
                            <span
                              class="w-8 h-8 flex-shrink-0 flex items-center justify-center bg-alfan-orange text-white rounded-full mr-4 font-mono">
                              {{ $index + 1 }}
                            </span>
                            <span class="whitespace-normal break-words text-left">{{ $faq->question }}</span>
                          </div>

                          <!-- Right side: arrow -->
                          <svg id="icon{{ $faq->id }}"
                            class="ml-2 w-6 h-6 flex-shrink-0 text-alfan-green transition-transform duration-300 transform"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                          </svg>
                        </button>

                        <div class="faq-answer rounded-b-xl mt-1 bg-white/95 border-l-4 border-alfan-green-dark"
                            id="answer{{ $faq->id }}">
                            <div class="content pb-6 pt-4 px-6">
                                <p class="text-alfan-black leading-relaxed text-lg">
                                    {{ $faq->answer }}
                                </p>
                                @auth
                                    <div class="mt-4 flex flex-wrap gap-3">
                                        <a href="{{ route('faqs.edit', $faq->slug) }}"
                                            class="transition-all duration-200 hover:scale-105">
                                            <button
                                                class="text-white font-bold px-4 py-2 bg-gradient-to-r from-alfan-green to-alfan-green-dark rounded-lg hover:shadow-md flex items-center gap-2">
                                                ✏️ Edit
                                            </button>
                                        </a>
                                        <form action="{{ route('faqs.destroy', $faq->slug) }}" method="POST"
                                            class="transition-all duration-200 hover:scale-105">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white font-bold px-4 py-2 bg-gradient-to-r from-alfan-orange to-alfan-orange-dark rounded-lg hover:shadow-md flex items-center gap-2">
                                                🗑 Delete
                                            </button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Footer -->
            <div class="mt-12 text-center">
                <p class="text-alfan-black">Still have questions?</p>
                <button
                    class="mt-4 px-8 py-3 bg-gradient-to-r from-alfan-orange to-alfan-orange-dark text-white font-bold rounded-full hover:shadow-lg transition-all duration-300 hover:scale-105">
                    <a href="\contact">Contact Us</a>
                </button>
                <div class="mt-6 flex justify-center space-x-4">
                    <div class="w-10 h-10 rounded-full bg-alfan-green/30"></div>
                    <div class="w-10 h-10 rounded-full bg-alfan-orange/30"></div>
                    <div class="w-10 h-10 rounded-full bg-alfan-black/20"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle FAQ answers
    function toggleAnswer(answerId) {
        const answer = document.getElementById(answerId);
        const icon = document.getElementById(`icon${answerId.replace('answer', '')}`);

        const isOpen = answer.classList.contains('open');
        if (isOpen) {
            answer.style.maxHeight = '0';
            answer.style.opacity = '0';
            icon.classList.remove('rotate-180');
            answer.addEventListener('transitionend', () => {
                answer.classList.remove('open');
            }, { once: true });
        } else {
            answer.classList.add('open');
            const fullHeight = answer.scrollHeight;
            answer.style.maxHeight = fullHeight + 'px';
            answer.style.opacity = '1';
            icon.classList.add('rotate-180');
        }
    }
</script>
