<!-- Our Team Section -->
<section class="py-8 px-4 bg-white" id="team-section">
  <div class="max-w-[85%] mx-auto">
    <!-- Section Header -->
    <div class="text-center mb-16">
      <h2 class="text-4xl italic md:text-5xl font-bold text-amber-800 mb-2">Our Team</h2>
      <div class="w-24 h-1 bg-amber-500 mx-auto rounded-full mb-3"></div>
      <span class="inline-block px-4 py-2 bg-orange-100 text-orange-600 rounded-full text-sm font-semibold mb-4">Meet the Experts</span>
      <p class="text-gray-600 max-w-2xl mx-auto text-lg">
        Learn from the best in the industry. Our team of award-winning pastry chefs and bakers bring decades of experience to our classrooms.
      </p>
    </div>

    <!-- Team Slider -->
    <div 
      x-data="teamSlider({{ count($teamMembers) }})" 
      x-init="init()" 
      class="relative overflow-hidden"
    >
      <!-- Slides Wrapper -->
      <div 
        class="flex transition-transform duration-700 ease-in-out"
        :style="`transform: translateX(-${currentIndex * (100/visibleItems)}%)`"
        @transitionend="checkLoop"
      >
        <!-- Real Members -->
        @foreach($teamMembers as $index => $member)
          <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 flex-shrink-0 px-2">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg group relative h-80">
              <div class="relative overflow-hidden h-full">
                <img src="{{ $member->image_path ? asset('storage/' . $member->image_path) : asset('images/default-team-member.jpg') }}"
                     loading="lazy"
                     alt="{{ $member->name }}"
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/10"></div>
                <div class="absolute bottom-0 left-0 p-6">
                  <h3 class="text-xl sm:text-2xl font-bold text-orange-400 drop-shadow-md">{{ $member->name }}</h3>
                  <p class="font-medium text-white drop-shadow-md">{{ $member->position }}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        <!-- Cloned first members for smooth infinite loop -->
        @foreach($teamMembers->take(4) as $member)
          <div class="w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 flex-shrink-0 px-2">
            <div class="bg-white rounded-xl overflow-hidden shadow-lg group relative h-80">
              <div class="relative overflow-hidden h-full">
                <img src="{{ $member->image_path ? asset('storage/' . $member->image_path) : asset('images/default-team-member.jpg') }}"
                     loading="lazy"
                     alt="{{ $member->name }}"
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-black/10"></div>
                <div class="absolute bottom-0 left-0 p-6">
                  <h3 class="text-xl sm:text-2xl font-bold text-orange-400 drop-shadow-md">{{ $member->name }}</h3>
                  <p class="font-medium text-white drop-shadow-md">{{ $member->position }}</p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- Alpine.js Script -->
<script>
function teamSlider(totalItems) {
  return {
    currentIndex: 0,
    totalItems: totalItems,
    visibleItems: 1,
    interval: null,
    allowTransition: true,

    init() {
      this.updateVisibleItems();
      window.addEventListener('resize', () => this.updateVisibleItems());

      if (this.totalItems > this.visibleItems) {
        this.startAutoSlide();
      }
    },

    updateVisibleItems() {
      if (window.innerWidth >= 1280) {
        this.visibleItems = 4;
      } else if (window.innerWidth >= 1024) {
        this.visibleItems = 3;
      } else if (window.innerWidth >= 640) {
        this.visibleItems = 2;
      } else {
        this.visibleItems = 1;
      }
    },

    startAutoSlide() {
      this.interval = setInterval(() => {
        this.next();
      }, 2500);
    },

    next() {
      this.currentIndex++;
    },

    checkLoop() {
      if (this.currentIndex >= this.totalItems) {
        this.allowTransition = false;
        this.currentIndex = 0;

        // Jump instantly to start (no animation)
        requestAnimationFrame(() => {
          this.allowTransition = true;
        });
      }
    }
  }
}
</script>

