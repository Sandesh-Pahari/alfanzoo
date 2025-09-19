@extends('template.template')

@section('pagecontent')
    <style>
        /* Spinner */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .fa-spinner {
            animation: spin 1s linear infinite;
        }

        /* Reveal Animations */
        @keyframes revealUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes revealLeft {
            from {
                opacity: 0;
                transform: translateX(-40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes revealRight {
            from {
                opacity: 0;
                transform: translateX(40px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-reveal-up {
            animation: revealUp 0.8s ease-out forwards;
        }

        .animate-reveal-left {
            animation: revealLeft 0.8s ease-out forwards;
        }

        .animate-reveal-right {
            animation: revealRight 0.8s ease-out forwards;
        }

        .animate-card-drop {
            animation: revealUp 1s ease-out forwards;
        }
    </style>

    <!-- Flash Message -->
    <div id="flashMessage"
        class="fixed top-16 xl:top-16 left-0 right-0 text-center py-3 z-50 hidden animate-fade-in rounded-lg mx-6">
        <span id="flashMessageText"></span>
    </div>

    <!-- Loading Indicator -->
    <div id="loadingIndicator"
        class="fixed top-16 xl:top-16 left-0 right-0 bg-alfan-orange text-white text-center py-3 z-50 hidden animate-fade-in rounded-lg mx-6 shadow-lg">
        Sending your message... <i class="fas fa-spinner fa-spin"></i>
    </div>

    <section id="contact"
        class="bg-gradient-to-br from-alfan-white to-alfan-green-light/20 py-12 px-4 sm:px-6 lg:px-8 overflow-hidden mt-20">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-16 scroll-reveal opacity-0">
                <h2
                    class="text-4xl md:text-5xl italic font-bold text-alfan-green mb-4 relative inline-block animate-reveal-up">
                    Contact Us
                    <div
                        class="absolute bottom-0 left-1/2 w-32 h-1.5 bg-alfan-orange transform -translate-x-1/2 rounded-full">
                    </div>
                </h2>
                <p class="text-lg text-alfan-black max-w-2xl mx-auto leading-relaxed animate-reveal-up"
                    style="animation-delay: 0.2s">
                    Have questions about our pastries or custom orders? We're here to help with all your sweet inquiries!
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <!-- Info Card -->
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all scroll-reveal opacity-0 animate-card-drop">
                        <div class="bg-alfan-green text-white py-6 px-8 text-center">
                            <h3 class="text-2xl font-semibold">Contact Information</h3>
                        </div>

                        <div class="p-6 space-y-8">
                            <!-- Address -->
                            <div class="flex items-start animate-reveal-left" style="animation-delay: 0.2s">
                                <div class="bg-alfan-orange p-3 rounded-full shadow-md flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                                </div>
                                <div class="ml-6">
                                    <h4 class="text-xl font-semibold text-alfan-green mb-2">Our School & Bakery</h4>
                                    <p class="text-alfan-black">Kumaripati, Lalitpur, Nepal</p>
                                    <p class="text-alfan-black text-sm mt-1">Open Sunday–Friday, 9AM–5PM</p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start animate-reveal-left" style="animation-delay: 0.3s">
                                <div class="bg-alfan-orange p-3 rounded-full shadow-md flex-shrink-0">
                                    <i class="fas fa-phone-alt text-white text-2xl"></i>
                                </div>
                                <div class="ml-6">
                                    <h4 class="text-xl font-semibold text-alfan-green mb-2">Call Us</h4>
                                    <p class="text-alfan-black">+015592370</p>
                                    <a href="tel:+015592370"
                                        class="text-alfan-orange hover:text-alfan-green text-sm font-medium mt-1 inline-block transition-colors">
                                        Click to call →
                                    </a>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start animate-reveal-left" style="animation-delay: 0.4s">
                                <div class="bg-alfan-orange p-3 rounded-full shadow-md flex-shrink-0">
                                    <i class="fas fa-envelope text-white text-2xl"></i>
                                </div>
                                <div class="ml-6">
                                    <h4 class="text-xl font-semibold text-alfan-green mb-2">Email Us</h4>
                                    <p class="text-alfan-black">sudanshah.chef@gmail.com</p>
                                    <a href="mailto:sudanshah.chef@gmail.com"
                                        class="text-alfan-orange hover:text-alfan-green text-sm font-medium mt-1 inline-block transition-colors">
                                        Send email →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Socials -->
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all scroll-reveal opacity-0 animate-card-drop"
                        style="animation-delay: 0.2s">
                        <div class="text-alfan-green py-6 px-8 text-center">
                            <h3 class="text-2xl font-semibold">Connect With Us</h3>
                        </div>

                        <div class="p-6">
                            <div class="flex justify-center flex-wrap gap-4">
                                <a href="#" target="_blank" rel="noopener noreferrer"
                                    class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-[#1877F2] text-white hover:opacity-80 transition"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank" rel="noopener noreferrer"
                                    class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-[#E1306C] text-white hover:opacity-80 transition"><i
                                        class="fab fa-instagram"></i></a>
                                <a href="#" target="_blank" rel="noopener noreferrer"
                                    class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-[#25D366] text-white hover:opacity-80 transition"><i
                                        class="fab fa-whatsapp"></i></a>
                                <a href="#" target="_blank" rel="noopener noreferrer"
                                    class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-black text-white hover:opacity-80 transition"><i
                                        class="fab fa-tiktok"></i></a>
                                <a href="#" target="_blank" rel="noopener noreferrer"
                                    class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-[#FF0000] text-white hover:opacity-80 transition"><i
                                        class="fab fa-youtube"></i></a>
                                <a href="#" target="_blank" rel="noopener noreferrer"
                                    class="w-12 h-12 rounded-full flex items-center justify-center text-2xl bg-[#0077B5] text-white hover:opacity-80 transition"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                            <p class="text-center text-alfan-black mt-6 animate-fade-in" style="animation-delay: 0.8s">
                                Follow us for daily pastry inspiration, special offers, and behind-the-scenes baking magic!
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div
                    class="bg-white rounded-2xl shadow-xl border-2 border-alfan-orange overflow-hidden scroll-reveal opacity-0 animate-reveal-right">
                    <div class="bg-gradient-to-r from-alfan-green to-alfan-orange text-white py-6 px-8 text-center">
                        <h3 class="text-2xl font-semibold">Send Us a Message</h3>
                    </div>

                    <form id="contactForm" class="p-6 space-y-6">
                        @csrf
                        <div class="animate-reveal-up" style="animation-delay: 0.2s">
                            <label class="block text-lg font-medium text-alfan-green mb-2">Full Name</label>
                            <input type="text" name="name"
                                class="w-full px-4 py-3 rounded-lg border-2 border-alfan-orange focus:border-alfan-green focus:ring-2 focus:ring-alfan-green/30 outline-none transition-all bg-alfan-white"
                                placeholder="Your Name" required>
                        </div>

                        <div class="animate-reveal-up" style="animation-delay: 0.3s">
                            <label class="block text-lg font-medium text-alfan-green mb-2">Email Address</label>
                            <input type="email" name="email"
                                class="w-full px-4 py-3 rounded-lg border-2 border-alfan-orange focus:border-alfan-green focus:ring-2 focus:ring-alfan-green/30 outline-none transition-all bg-alfan-white"
                                placeholder="your@email.com" required>
                        </div>

                        <div class="animate-reveal-up" style="animation-delay: 0.4s">
                            <label class="block text-lg font-medium text-alfan-green mb-2">Phone Number</label>
                            <input type="tel" name="whatsapp"
                                class="w-full px-4 py-3 rounded-lg border-2 border-alfan-orange focus:border-alfan-green focus:ring-2 focus:ring-alfan-green/30 outline-none transition-all bg-alfan-white"
                                placeholder="(123) 456-7890">
                        </div>

                        <div class="animate-reveal-up" style="animation-delay: 0.5s">
                            <label class="block text-lg font-medium text-alfan-green mb-2">Your Message</label>
                            <textarea rows="5" name="message"
                                class="w-full px-4 py-3 rounded-lg border-2 border-alfan-orange focus:border-alfan-green focus:ring-2 focus:ring-alfan-green/30 outline-none transition-all bg-alfan-white"
                                placeholder="Tell us about your pastry needs..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-alfan-green to-alfan-orange text-white py-4 px-6 rounded-lg font-semibold text-lg hover:shadow-lg transition-all duration-300 hover:-translate-y-1 animate-bounce-in"
                            style="animation-delay: 0.6s">
                            <i class="fas fa-paper-plane mr-2"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Map -->
            <div class="mt-20 text-center scroll-reveal opacity-0">
                <h3 class="font-bold text-4xl italic text-alfan-green mb-4 animate-reveal-up">Our Location</h3>
                <p class="text-lg text-alfan-black mb-8 animate-reveal-up" style="animation-delay: 0.2s">Come visit us for
                    a sweet experience!</p>

                <div class="h-96 w-full rounded-2xl shadow-lg overflow-hidden border-2 border-alfan-orange">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3515.307539160678!2d83.93882097562471!3d28.228343802320147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995952ddf9b7667%3A0xc0d8029e6c9b5788!2sAlfanzoo%20Resort!5e0!3m2!1sen!2snp!4v1758271551870!5m2!1sen!2snp"
                        width="100%" height="100%" style="border:0;" allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);
            const flashMessage = document.getElementById('flashMessage');
            const flashMessageText = document.getElementById('flashMessageText');
            const loadingIndicator = document.getElementById('loadingIndicator');

            loadingIndicator.classList.remove('hidden');

            fetch('{{ route('contact.send') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => {
                            throw err;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    form.reset();
                    flashMessageText.textContent = data.message;
                    flashMessage.className =
                        "fixed top-16 left-0 right-0 bg-green-100 text-green-700 text-center py-3 z-50 rounded-lg mx-6";
                })
                .catch(error => {
                    flashMessageText.textContent = error.message || 'An error occurred. Please try again.';
                    flashMessage.className =
                        "fixed top-16 left-0 right-0 bg-red-100 text-red-700 text-center py-3 z-50 rounded-lg mx-6";
                })
                .finally(() => {
                    loadingIndicator.classList.add('hidden');
                    flashMessage.classList.remove('hidden');
                    setTimeout(() => flashMessage.classList.add('hidden'), 4000);
                });
        });

        // Scroll reveal animation
        document.addEventListener('DOMContentLoaded', () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add(
                            entry.target.classList.contains('scroll-reveal-left') ?
                            'animate-reveal-left' :
                            entry.target.classList.contains('scroll-reveal-right') ?
                            'animate-reveal-right' :
                            'animate-reveal-up'
                        );
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });
    </script>
@endsection
