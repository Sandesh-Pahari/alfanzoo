<footer class="relative mt-16 text-white overflow-hidden font-sans">
  <!-- Parallax Background Image with Overlay -->
  <div class="absolute inset-0 bg-fixed bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cmVzb3J0fGVufDB8fDB8fHww');"></div>
  <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/70 to-black/90"></div>

  <!-- Content -->
  <div class="relative max-w-7xl mx-auto px-6 py-20 grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-10 lg:gap-12 animate-fadeInUp">
    
    <!-- Logo & About -->
    <div class="space-y-4">
      <img src="{{asset('alphanzoo/logo/Alfanzoo.png')}}" alt="Alfanzoo Resort Logo" class="w-40 mb-4 animate-float drop-shadow-xl">
      <p class="text-alfan-white leading-relaxed text-sm md:text-base">
        Escape into nature’s paradise. Experience luxury, adventure, and tranquility at <span class="text-brand-gold font-semibold">Alfanzoo Resort</span>.
      </p>
      <!-- Social Media Icons -->
      <div class="flex space-x-4 mt-4">
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-brand-gold hover:bg-alfan-orange transition transform hover:scale-110 shadow-lg">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-brand-gold hover:bg-alfan-orange transition transform hover:scale-110 shadow-lg">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-brand-gold hover:bg-alfan-orange transition transform hover:scale-110 shadow-lg">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-brand-gold hover:bg-alfan-orange transition transform hover:scale-110 shadow-lg">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 class="text-2xl font-semibold text-brand-sun mb-6 border-b-2 border-brand-gold inline-block pb-2 tracking-wide">Quick Links</h3>
      <ul class="space-y-3 text-alfan-white text-sm md:text-base">
        <li><a href="/" class="flex items-center gap-2 hover:text-brand-olive transition duration-300"><i class="fas fa-chevron-right text-brand-gold"></i> Home</a></li>
        <li><a href="/about" class="flex items-center gap-2 hover:text-brand-olive transition duration-300"><i class="fas fa-chevron-right text-brand-gold"></i> About Us</a></li>
        <li><a href="/rooms" class="flex items-center gap-2 hover:text-brand-olive transition duration-300"><i class="fas fa-chevron-right text-brand-gold"></i> Rooms & Suites</a></li>
        <li><a href="/activities" class="flex items-center gap-2 hover:text-brand-olive transition duration-300"><i class="fas fa-chevron-right text-brand-gold"></i> Activities</a></li>
        <li><a href="/contact" class="flex items-center gap-2 hover:text-brand-olive transition duration-300"><i class="fas fa-chevron-right text-brand-gold"></i> Contact</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="">
      <a href="{{}}">
        <h4 class="text-2xl font-semibold text-brand-sun mb-6 border-b-2 border-brand-gold italic pb-2 tracking-wide">Contact Us</h4>
        <ul class="text-alfan-white space-y-3 text-sm md:text-base">
          <li class="flex items-center text-lg">
            <i class="fas fa-map-marker-alt mr-3 text-2xl text-brand-gold"></i>
            Chitwan, Nepal
          </li>
          <li class="flex items-center text-lg">
            <i class="far fa-envelope mr-3 text-2xl text-brand-gold"></i>
            info@alfanzoo.com
          </li>
          <li class="flex items-center text-lg">
            <i class="fas fa-phone-alt mr-3 text-2xl text-brand-gold"></i>
            +977-9800000000
          </li>
          <li class="flex items-center text-lg">
            <i class="far fa-clock mr-3 text-2xl text-brand-gold"></i>
            Sun-Fri 9am - 5pm
          </li>
        </ul>
      </a>
    </div>

    <!-- Newsletter -->
    <div>
      <h3 class="text-2xl font-semibold text-brand-sun mb-6 border-b-2 border-brand-gold inline-block pb-2 tracking-wide">Stay Updated</h3>
      <p class="text-alfan-white mb-3 text-sm md:text-base">Subscribe to our newsletter for latest offers & news.</p>
      <form class="flex animate-slideInRight">
        <input type="email" placeholder="Enter your email" class="w-full px-4 py-3 rounded-l-lg text-black focus:outline-none shadow-md">
        <button class="bg-brand-gold px-6 py-3 rounded-r-lg hover:bg-alfan-orange transition shadow-md font-medium">Subscribe</button>
      </form>
    </div>
  </div>


  <!-- Bottom Section -->
  <div class="relative bg-black bg-opacity-90 text-center py-4 border-t border-gray-700">
    <p class="text-gray-400 text-sm">© 2025 Alfanzoo Resort. All Rights Reserved.</p>
  </div>
</footer>

<!-- Animations -->
<style>
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}
.animate-fadeInUp { animation: fadeInUp 1s ease-out; }

@keyframes slideInRight {
  from { opacity: 0; transform: translateX(50px); }
  to { opacity: 1; transform: translateX(0); }
}
.animate-slideInRight { animation: slideInRight 1s ease-out; }

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}
.animate-float { animation: float 3s ease-in-out infinite; }
</style>

