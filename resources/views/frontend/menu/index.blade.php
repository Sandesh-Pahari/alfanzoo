@extends('template.template')
@section('pagecontent')
    <section class="menu-section bg-gray-100 py-6 mt-24" x-data="menuComponent()">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl md:text-5xl font-bold text-center mb-10 underline text-brand-brown"
                style="font-family: 'Times New Roman', Times, serif">
                Our Menu
            </h1>

            @auth
                <!-- Upload Form -->
                <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data"
                    class="mb-6 flex items-center gap-4">
                    @csrf
                    <input type="file" name="image" accept="image/*" required class="border p-2 rounded">
                    <button type="submit" class="bg-brand-brown text-white px-4 py-2 rounded">Upload</button>
                </form>
            @endauth

            <!-- Image Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                <template x-for="(img, index) in images" :key="index">
                    <div class="menu-card relative group cursor-pointer">
                        <img :src="img.url" class="w-full max-h-screen object-contain rounded-xl shadow-xl"
                            alt="Menu Page" @click="currentIndex = index; showModal = true">

                        @auth
                            <!-- Delete Button -->
                            <form method="POST" :action="`/menu/${img.id}`"
                                class="absolute top-2 right-2 hidden group-hover:block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-2 py-1 text-xs rounded">Delete</button>
                            </form>
                        @endauth
                    </div>
                </template>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="showModal" x-transition
            class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50">
            <div class="relative max-w-4xl w-full px-4">
                <!-- Close button -->
                <button @click="showModal = false"
                    class="absolute top-4 right-4 text-white text-3xl font-bold">&times;</button>

                <!-- Image -->
                <img :src="images[currentIndex].url"
                    class="w-full max-h-[90vh] object-contain rounded-xl shadow-lg mx-auto">

                <!-- Prev button -->
                <button @click="prevImage"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-4xl font-bold">&#10094;</button>

                <!-- Next button -->
                <button @click="nextImage"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-4xl font-bold">&#10095;</button>
            </div>
        </div>
    </section>

    <script>
        function menuComponent() {
            return {
                showModal: false,
                currentIndex: 0,
                images: @json($menuImages), // Pass from controller

                init() {
                    document.addEventListener('keydown', (e) => {
                        if (!this.showModal) return;

                        switch (e.key) {
                            case 'Escape': // close modal
                                this.showModal = false;
                                break;
                            case 'ArrowLeft': // previous image
                                this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images
                                    .length;
                                break;
                            case 'ArrowRight': // next image
                                this.currentIndex = (this.currentIndex + 1) % this.images.length;
                                break;
                        }
                    });
                },
                
                prevImage() {
                    this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
                },
                nextImage() {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                }
            }
        }
    </script>
@endsection
