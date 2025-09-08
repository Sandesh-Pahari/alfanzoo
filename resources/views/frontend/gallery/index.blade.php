@extends('template.template')

@section('pagecontent')


    <section class="bg-brand-sun/10 mt-20 pt-10">

        <!-- Header Section -->
        <div class="relative max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-12">
            <div class="text-center mb-6">
                <h1 class="text-4xl italic md:text-5xl font-bold text-brand-brown font-serif">
                    <span class="relative inline-block highlight-text">
                        Alfanzoo Gallery
                    </span>
                </h1>
                <div class="w-24 h-1 bg-alfan-orange mx-auto my-4 rounded-full"></div>
                <p class="mt-4 text-lg text-alfan-green-dark max-w-4xl mx-auto">
                    Explore the captivating moments captured at Alfanzoo Resort. Our gallery showcases the beauty and joy of our guests as they create unforgettable memories amidst nature and adventure.
                </p>
            </div>

            <!-- Controls Section -->
            <div class="flex flex-col sm:flex-row justify-center items-center mb-6 gap-4">
                <!-- Add Items Button -->
                @auth
                    <a href="{{ route('gallery.create') }}">
                        <button
                            class="bg-brand-brown hover:bg-amber-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Photo
                        </button>
                    </a>
                @endauth
            </div>
        </div>

        <!-- Gallery Container -->
        <div class="max-w-[90%] mx-auto px-4 sm:px-6 lg:px-8 pb-12">
            @if ($photos->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6"
                    id="gallery-container">
                    <!-- Photo Items -->
                    @foreach ($photos as $photo)
                        <div
                            class="gallery-item rounded-xl overflow-hidden shadow-lg bg-white cursor-pointer transition-all duration-300 hover:scale-[1.02] relative group">
                            <div class="overflow-hidden rounded-t-xl aspect-square">
                                <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}"
                                    class="w-full h-full object-cover transition duration-300 group-hover:opacity-90 open-fullscreen"
                                    loading="lazy" />
                            </div>
                            <div class="image-title bg-gradient-to-t from-black/80 to-transparent">
                                <h3 class="font-semibold text-lg text-white">{{ $photo->title }}</h3>
                                <p class="text-sm text-amber-200">📅 {{ $photo->created_at->format('M d, Y') }}</p>
                            </div>
                            <div class="action-buttons">
                                @auth

                                    <form action="{{ route('gallery.destroy', $photo->id) }}" method="POST"
                                        class="delete-btn-form">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="delete-btn" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this photo?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="text-6xl mb-4 text-gray-300">📷</div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No photos yet</h3>
                    @auth
                        <p class="text-gray-500 mb-6">Start building your gallery by adding your first photo!</p>
                        <a href="{{ route('gallery.create') }}"
                            class="bg-amber-600 hover:bg-amber-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-all duration-300">
                            Add Your First Photo
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </section>

    <!-- Fullscreen Overlay -->
    <div class="fullscreen-overlay" id="fullscreenOverlay">
        <div class="nav-arrow left" id="prevArrow">
            <i class="fas fa-chevron-left"></i>
        </div>

        <div class="image-container relative w-full h-full flex items-center justify-center p-4">
            <img src="" alt="" class="fullscreen-image shadow-2xl" id="fullscreenImage">
        </div>

        <div class="nav-arrow right" id="nextArrow">
            <i class="fas fa-chevron-right"></i>
        </div>

        <div class="close-fullscreen" id="closeFullscreen">
            <i class="fas fa-times"></i>
        </div>

        <div class="absolute bottom-8 left-0 right-0 text-center text-white text-lg font-medium" id="imageCounter"></div>
    </div>


    <style>
        /* Animation Styles */
        .gallery-item {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s cubic-bezier(0.5, 0, 0, 1);
        }

        .gallery-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        /* Stagger animation delays */
        .gallery-item:nth-child(1) {
            transition-delay: 0.1s;
        }

        .gallery-item:nth-child(2) {
            transition-delay: 0.2s;
        }

        .gallery-item:nth-child(3) {
            transition-delay: 0.3s;
        }

        .gallery-item:nth-child(4) {
            transition-delay: 0.4s;
        }

        .gallery-item:nth-child(5) {
            transition-delay: 0.5s;
        }

        .gallery-item:nth-child(6) {
            transition-delay: 0.6s;
        }

        .gallery-item:nth-child(7) {
            transition-delay: 0.7s;
        }

        .gallery-item:nth-child(8) {
            transition-delay: 0.8s;
        }

        .gallery-item:nth-child(9) {
            transition-delay: 0.9s;
        }

        .gallery-item:nth-child(10) {
            transition-delay: 1.0s;
        }

        /* Gallery Item Styles */
        .gallery-item {
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .gallery-item:hover {
            transform: scale(1.02) translateY(0) !important;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.08);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .image-title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem 1rem;
            transform: translateY(100%);
            transition: all 0.3s ease;
            opacity: 0;
        }

        .gallery-item:hover .image-title {
            transform: translateY(0);
            opacity: 1;
        }

        .action-buttons {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            gap: 0.5rem;
        }

        .gallery-item:hover .action-buttons {
            opacity: 1;
        }

        .edit-btn,
        .delete-btn {
            background: rgba(255, 255, 255, 0.95);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            z-index: 10;
            border: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(4px);
        }

        .edit-btn {
            color: #f59e0b;
        }

        .edit-btn:hover {
            background: #f59e0b;
            color: white;
            transform: scale(1.1);
        }

        .delete-btn {
            color: #ef4444;
        }

        .delete-btn:hover {
            background: #ef4444;
            color: white;
            transform: scale(1.1);
        }

        /* Fullscreen overlay styles */
        .fullscreen-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            backdrop-filter: blur(8px);
        }

        .fullscreen-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        .fullscreen-image {
            max-width: 90%;
            max-height: 85vh;
            object-fit: contain;
            border-radius: 0.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .close-fullscreen {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            color: white;
            font-size: 1.75rem;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.15);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            z-index: 10;
            backdrop-filter: blur(8px);
        }

        .close-fullscreen:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: scale(1.1);
        }

        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 1.75rem;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.15);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            z-index: 10;
            backdrop-filter: blur(8px);
        }

        .nav-arrow:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-50%) scale(1.1);
        }

        .nav-arrow.left {
            left: 1.5rem;
        }

        .nav-arrow.right {
            right: 1.5rem;
        }

        .nav-arrow.hidden {
            visibility: hidden;
            opacity: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .gallery-item {
                margin-bottom: 0.5rem;
            }

            .edit-btn,
            .delete-btn {
                width: 32px;
                height: 32px;
                font-size: 0.875rem;
            }

            .fullscreen-image {
                max-width: 95%;
                max-height: 80vh;
            }

            .nav-arrow,
            .close-fullscreen {
                width: 44px;
                height: 44px;
                font-size: 1.5rem;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize animations
            function initAnimations() {
                // First, animate all gallery items on page load
                const galleryItems = document.querySelectorAll('.gallery-item');
                galleryItems.forEach(item => {
                    item.classList.add('animate');
                });

                // Then set up scroll animations
                setupScrollAnimations();
            }

            // Set up scroll animations
            function setupScrollAnimations() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                });

                // Observe all gallery items
                document.querySelectorAll('.gallery-item:not(.animate)').forEach(item => {
                    observer.observe(item);
                });
            }

            // Initialize everything
            initAnimations();

            // Gallery functionality
            const galleryContainer = document.getElementById("gallery-container");
            let galleryArray = [];
            let currentIndex = 0;

            // Fullscreen elements
            const fullscreenOverlay = document.getElementById("fullscreenOverlay");
            const fullscreenImage = document.getElementById("fullscreenImage");
            const closeFullscreen = document.getElementById("closeFullscreen");
            const prevArrow = document.getElementById("prevArrow");
            const nextArrow = document.getElementById("nextArrow");
            const imageCounter = document.getElementById("imageCounter");

            // Initialize gallery
            function initGallery() {
                galleryArray = Array.from(document.querySelectorAll('.gallery-item .open-fullscreen'));
            }

            // Open image in fullscreen
            function openFullscreen(index) {
                if (galleryArray.length === 0) return;

                currentIndex = index;
                fullscreenImage.src = galleryArray[index].src;
                fullscreenImage.alt = galleryArray[index].alt;
                fullscreenOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';

                // Update counter
                imageCounter.textContent = `${currentIndex + 1} / ${galleryArray.length}`;

                // Update arrow visibility
                updateArrows();
            }

            // Update arrow visibility
            function updateArrows() {
                if (galleryArray.length <= 1) {
                    prevArrow.classList.add('hidden');
                    nextArrow.classList.add('hidden');
                    return;
                }

                prevArrow.classList.toggle('hidden', currentIndex === 0);
                nextArrow.classList.toggle('hidden', currentIndex === galleryArray.length - 1);
            }

            // Navigate to previous image
            function prevImage() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateFullscreenImage();
                }
            }

            // Navigate to next image
            function nextImage() {
                if (currentIndex < galleryArray.length - 1) {
                    currentIndex++;
                    updateFullscreenImage();
                }
            }

            // Update fullscreen image
            function updateFullscreenImage() {
                fullscreenImage.src = galleryArray[currentIndex].src;
                fullscreenImage.alt = galleryArray[currentIndex].alt;
                updateArrows();
                imageCounter.textContent = `${currentIndex + 1} / ${galleryArray.length}`;
            }

            // Close fullscreen
            function closeFullscreenView() {
                fullscreenOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }

            // Initialize gallery
            initGallery();

            // Event listeners
            // Open fullscreen when clicking images
            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("open-fullscreen")) {
                    e.preventDefault();
                    const index = galleryArray.indexOf(e.target);
                    if (index !== -1) openFullscreen(index);
                }
            });

            // Navigation arrows
            prevArrow.addEventListener("click", (e) => {
                e.stopPropagation();
                prevImage();
            });

            nextArrow.addEventListener("click", (e) => {
                e.stopPropagation();
                nextImage();
            });

            // Close fullscreen
            closeFullscreen.addEventListener("click", closeFullscreenView);

            // Close when clicking outside image
            fullscreenOverlay.addEventListener("click", (e) => {
                if (e.target === fullscreenOverlay || e.target.classList.contains('image-container')) {
                    closeFullscreenView();
                }
            });

            // Keyboard navigation
            document.addEventListener("keydown", (e) => {
                if (!fullscreenOverlay.classList.contains('active')) return;

                switch (e.key) {
                    case 'Escape':
                        closeFullscreenView();
                        break;
                    case 'ArrowLeft':
                        prevImage();
                        break;
                    case 'ArrowRight':
                        nextImage();
                        break;
                }
            });
        });
    </script>
@endsection
