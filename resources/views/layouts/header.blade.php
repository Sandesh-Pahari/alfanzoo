<style>
    /* Dropdown and transition styles */
    .dropdown-menu li {
        color: #8B4513;
    }

    .block {
        display: block;
    }

    /* Navbar transitions */
    #navbar {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    #navbar button,
    #navbar a {
        transition: color 0.3s ease;
    }

    .dropdown-menu {
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    /* Mobile menu button fixed positioning */
    #mobileMenuButton {
        position: fixed;
        top: 10px;
        right: 20px;
        z-index: 1000;
        color: #FFF8E1;
        background-color: #8B4513;
        padding: 10px;
        border-radius: 5px;
        display: none;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    @media (max-width: 1023px) {
        #mobileMenuButton {
            display: block;
        }
    }
      @media (max-width: 1023px) {
        #mobileNavbar a,
        #mobileNavbar button {
            color: #FFF8E1 !important;
        }
        
        #mobileNavbar a:hover,
        #mobileNavbar button:hover {
            color: #FFF8E1 !important;
            background-color: transparent !important;
        }
        
        #coursesDropdown a {
            color: #FFF8E1 !important;
        }
    }

    /* Ensure mobile navbar is above other content */
    #mobileNavbar {
        z-index: 999;
    }

    /* Dropdown styles */
    .group:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
    }

    /* Mobile dropdown styles */
    #coursesDropdown {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }
    
    #coursesDropdown.show {
        max-height: 500px; /* Adjust based on your content */
    }

    /* Homepage dropdown text color */
    .homepage .dropdown-menu li a {
        color: #8B4513 !important; /* Pastry primary color */
    }

    /* Remove hover effects from sidebar */
    #mobileNavbar a:hover,
    #mobileNavbar button:hover {
        background-color: transparent !important;
        color: inherit !important;
    }

    #mobileNavbar li:hover {
        background-color: transparent !important;
    }

    /* Force black text whenever navbar has .scrolled (covers scrolled & other pages) */
#navbar.scrolled button,
#navbar.scrolled a {
  color: #000 !important;
}

/* Ensure active nav button keeps its highlight */
#navbar button[data-active="true"],
#navbar a[data-active="true"] {
  color: black !important; /* keep your active color */
}

/* For homepage top (transparent) keep white text */
body.homepage #navbar:not(.scrolled) button,
body.homepage #navbar:not(.scrolled) a {
  color: #fff !important;
}

</style>

<nav id="navbar" class="fixed w-full z-50 top-0 transition-all duration-300 bg-transparent">
    <div class="mx-auto px-0 xl:px-8">
        <div class="flex justify-between h-22 items-center">
            <!-- Logo and Name -->
            
            <div class="flex items-center">
                <img src="{{asset('alphanzoo/logo/Alfanzoo.png')}}" alt="Logo" class="logo-img xxs:h-16 xms:h-20  h-full w-full sm:ml-10 mr-3 transition-all duration-300">
                <div id="logoName" style="font-family: 'Rubik Doodle Shadow', cursive;"></div>
            </div>

            <!-- Navbar Items -->
            <ul class="navbar-ul hidden lg:flex lg:space-x-2 xl:space-x-6 transition-all duration-300 top-0">
                <li class="relative group nav-item">
                    <a href="{{ url('/') }}">
                        <button class="flex items-center justify-center  font-semibold px-3 mb-2 hover:text-[#D4A76A] focus:outline-none transition-colors duration-300">
                            Home
                        </button>
                    </a>
                </li>
                <li class="relative group">
                    <a href="{{('about')}}">
                        <button class="flex items-center  font-semibold px-3 mb-2 hover:text-[#D4A76A] focus:outline-none transition-colors duration-300">
                            About Us
                        </button>
                    </a>
                </li>
                
                <!-- Courses Dropdown -->
                <li class="relative group">
                        <a href="{{('booking')}}">
                    <button class="flex items-center  font-semibold px-3 hover:text-[#D4A76A] focus:outline-none transition-colors duration-300">
                        Bookings
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    </a>
                    <ul class="dropdown-menu absolute left-0 mt-2 w-56 bg-white border border-gray-200 shadow-lg rounded-md opacity-0 invisible transition-opacity duration-300" style="border-top: 4px solid black;">
                       
                            <li class="relative group">
                                <a href="{{('booking')}}" class="font-medium px-4 py-2 hover:bg-gray-200 cursor-pointer flex items-center">
                                    <div class="w-56 font-semibold text-black">Book a Room and Table Both</div>
                                </a>
                            </li>

                              <li class="relative group">
                                <a href="{{('room')}}" class="font-medium px-4 py-2 hover:bg-gray-200 cursor-pointer flex items-center">
                                    <div class="w-56 font-semibold text-black">Book a Room Only</div>
                                </a>
                                </li>

                                  <li class="relative group">
                                <a href="{{('spaces')}}" class="font-medium px-4 py-2 hover:bg-gray-200 cursor-pointer flex items-center">
                                    <div class="w-56 font-semibold text-black">Book Table Only</div>
                                </a>
                            </li>
                       
                    </ul>
                </li>

                 <li class="relative group">
                    <a href="{{('menu')}}">
                        <button class="flex items-center  font-semibold px-3 hover:text-[#D4A76A] focus:outline-none transition-colors duration-300">
                            Menu
                        </button>
                    </a>
                </li>

                <li class="relative group">
                    <a href="{{('gallery')}}">
                        <button class="flex items-center  font-semibold px-3 hover:text-[#D4A76A] focus:outline-none transition-colors duration-300">
                            Gallery
                        </button>
                    </a>
                </li>

               
                
                
                <li class="reltive group">
                    <a href="{{('faqs.index')}}">
                        <button class="flex items-center  font-semibold px-3 mb-2 hover:text-[#D4A76A] focus:outline-none transition-colors duration-300">
                            Faqs
                        </button>
                    </a>
                </li>
                
                <li class="relative group">
                        <a href="{{('team')}}">
                            <button class="flex items-center  font-semibold px-3 mb-2  hover:text-[#D4A76A] focus:outline-none  transition-colors duration-300">
                            Team
                            
                            </button>
                        </a>
                    
                    </li>
                     
                <li class="relative group">
                    <a href="{{('contact')}}">
                        <button class="flex items-center  font-semibold px-3 mb-2 hover:text-[#D4A76A] focus:outline-none transition-colors duration-300">
                            Contact Us
                            
                            </button>
                        </a>
                    
                    </li>
                     

                @auth
                  <li class="relative group">
                    <a href="{{('admindashboard')}}">
                        <button
                            {{-- class="flex items-center text-xl font-bold px-3 py-0.5 hover:text-orange-400 focus:outline-none  {{ request()->routeIs('contact') ? 'text-orange-400' : '' }} " --}}
                            class="flex items-center  text-xl font-bold px-3  py-0.5 hover:text-[#D4A76A] focus:outline-none  transition-colors duration-300">
                            <i class="fa-solid fa-circle-user"></i>
  
                        </button>
                    </a>
  
                </li>
                @endauth


            
    
                </ul>   
            </div>    
        </div>
    </div>
</nav>


<button id="mobileMenuButton" class="lg:hidden mt-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
    </svg>
</button>
<div id="mobileNavbar" class="fixed top-0 right-0 w-full sm:w-96 h-full transform translate-x-full transition-transform duration-300 z-50 lg:hidden overflow-y-auto">
    <div class="relative bg-center bg-cover h-full" style="background-image: url('{{ asset('images/hero/gpt.png') }}');">
        <div class="absolute inset-0 bg-[rgba(8,5,3,0.85)]"></div>

        <div class="relative z-10 h-full">
            <div class="flex justify-between items-center p-4 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <span>
                        <img src="{{ asset('alphanzoo/logo/Alfanzoo.png') }}" alt="Logo" class="h-24 w-24 rounded-full">
                    </span>
                </div>
                <button id="closeMobileMenu" class="text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <ul class="mt-4 space-y-2">
                  
                <li>
                    <a href="{{ url('/') }}" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">Home</a>
                </li>
                <li>
                    <a href="{{('about')}}" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">About Us</a>
                </li>
                
                {{-- <li>
                    <button class="w-full flex justify-between items-center text-[#FFF8E1] px-4 py-2 font-bold focus:outline-none"
                    style="color: #FFF8E1 !important;"
                        onclick="toggleDropdown('coursesDropdown')">
                        Our Courses
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="coursesDropdown" class="hidden pl-6 space-y-1">
                        
                        <li>
                            <a href="#" class="block px-4 py-2 text-md text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">
                              K xa
                            </a>
                        </li>
                        
                    </ul>
                </li> --}}
                
                <li>
                    <a href="{{('menu')}}" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">Menu</a>
                </li>
                
                <li>
                    <a href="{{('team')}}" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">Team</a>
                </li>
                
                {{-- <li>
                    <a href="{{ ('faqs.index') }}" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">FAQs</a>
                </li>
                
                <li>
                    <a href="/contact" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">Contact</a>
                </li>
                 <li>
                    <a href="/gallery" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">Gallery</a>
                </li>
                @auth
                <li>
                    <a href="{{ ('admin.dashboard') }}" class="block px-4 py-2 text-lg text-[#FFF8E1] font-semibold" style="color: #FFF8E1 !important;">Dashboard</a>
                </li>
                @endauth --}}
            </ul>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    const logoImg = document.querySelector(".logo-img");
    const navUl = document.querySelector(".navbar-ul");
    const mobileMenuButton = document.getElementById("mobileMenuButton");
    const mobileNavbar = document.getElementById("mobileNavbar");
    const closeMobileMenu = document.getElementById("closeMobileMenu");

    // Add homepage class if needed
    if (window.location.pathname === "/") {
        document.body.classList.add('homepage');
    }

    // Function to toggle mobile dropdown
    window.toggleDropdown = function(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
        dropdown.classList.toggle('show');
    };

    // Function to check screen size and handle menu button visibility
    function handleMenuButtonVisibility() {
        if (window.innerWidth >= 1024) {
            mobileMenuButton.style.display = "none";
            mobileNavbar.classList.remove("translate-x-0");
            mobileNavbar.classList.add("translate-x-full");
            document.body.style.overflow = "";
        } else {
            if (mobileNavbar.classList.contains("translate-x-full")) {
                mobileMenuButton.style.display = "block";
            } else {
                mobileMenuButton.style.display = "none";
            }
        }
    }

    // Mobile menu toggle functionality
    mobileMenuButton.addEventListener("click", () => {
        mobileNavbar.classList.remove("translate-x-full");
        mobileNavbar.classList.add("translate-x-0");
        mobileMenuButton.style.display = "none"; 
        document.body.style.overflow = "hidden";
    });

    closeMobileMenu.addEventListener("click", () => {
        mobileNavbar.classList.remove("translate-x-0");
        mobileNavbar.classList.add("translate-x-full");
        document.body.style.overflow = "";
        handleMenuButtonVisibility();
    });

    // Close mobile menu when clicking outside
    mobileNavbar.addEventListener("click", (e) => {
        if (e.target === mobileNavbar) {
            mobileNavbar.classList.remove("translate-x-0");
            mobileNavbar.classList.add("translate-x-full");
            document.body.style.overflow = "";
            handleMenuButtonVisibility();
        }
    });

    // Handle window resize
    window.addEventListener('resize', handleMenuButtonVisibility);

    // Function to get clean path from URL or 
    function getCleanPath(url) {
        const a = document.createElement('a');
        a.href = url;
        return a.pathname.split('?')[0].split('#')[0];
    }

    // Function to highlight active nav item
    function highlightActiveNavItem() {
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.navbar-ul a[href]');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            const linkPath = getCleanPath(href);
            
            if (currentPath === linkPath) {
                const button = link.querySelector('button');
                if (button) {
                    button.classList.add('text-[#5E2C04]');
                    button.classList.remove('text-[#FFF8E1]', 'text-[#8B4513]', 'hover:text-[#D4A76A]');
                    button.dataset.active = "true";
                }
            } else {
                const button = link.querySelector('button');
                if (button) {
                    button.classList.remove('text-[#5E2C04]');
                    if (navbar.classList.contains('scrolled')) {
                        button.classList.add('text-[#8B4513]');
                    } else {
                        button.classList.add('text-[#FFF8E1]');
                    }
                    button.classList.add('hover:text-[#D4A76A]');
                    button.removeAttribute('data-active');
                }
            }
        });
    }// Homepage scrolled → white bg + black text
function setScrolledState() {
    navbar.classList.add("scrolled", "shadow-lg", "bg-white");
    navbar.classList.remove("bg-transparent", "bg-gray-100");
    logoImg.classList.add("h-20", "w-20", "ml-4");
    logoImg.classList.remove("h-24","w-24","md:h-32", "md:w-32", "h-full", "w-full", "ml-10");
    navUl.classList.add("mt-2");

    mobileMenuButton.classList.remove("bg-[#a57d53]");
    mobileMenuButton.classList.add("bg-[#8B4513]");

    // Force black text in scrolled state
    navbar.querySelectorAll("button, a").forEach((el) => {
        if (!el.hasAttribute("data-active")) {
            el.classList.add("text-black");
            el.classList.remove("text-white");
        }
    });
}

// Homepage unscrolled → transparent bg + white text
function setUnscrolledState() {
    navbar.classList.remove("scrolled", "shadow-lg", "bg-white", "bg-gray-100");
    navbar.classList.add("bg-transparent");
    logoImg.classList.remove("h-20", "w-20", "ml-4");
    logoImg.classList.add("h-24","w-24","md:h-32", "md:w-32", "h-full", "w-full", "ml-10");
    navUl.classList.remove("mt-2");

    mobileMenuButton.classList.remove("bg-[#8B4513]");
    mobileMenuButton.classList.add("bg-[#a57d53]");

    // Force white text in unscrolled homepage
    navbar.querySelectorAll("button, a").forEach((el) => {
        if (!el.hasAttribute("data-active")) {
            el.classList.add("text-white");
            el.classList.remove("text-black");
        }
    });
}

// Other pages → gray-200 bg + black text
function setOtherPagesState() {
    navbar.classList.add("scrolled", "shadow-lg", "bg-gray-100");
    navbar.classList.remove("bg-transparent", "bg-white");
    logoImg.classList.add("h-20", "w-20", "ml-4");
    logoImg.classList.remove("h-24","w-24","md:h-32", "md:w-32", "h-full", "w-full", "ml-10");
    navUl.classList.add("mt-2");

    mobileMenuButton.classList.remove("bg-[#a57d53]");
    mobileMenuButton.classList.add("bg-[#8B4513]");

    // Force black text on all other pages
    navbar.querySelectorAll("button, a").forEach((el) => {
        if (!el.hasAttribute("data-active")) {
            el.classList.add("text-black");
            el.classList.remove("text-white");
        }
    });
}

// Apply correct behavior depending on page
if (window.location.pathname === "/") {
    window.addEventListener("scroll", () => {
        if (window.scrollY > 100) {
            setScrolledState();  // homepage scrolled → white bg + black text
        } else {
            setUnscrolledState(); // homepage top → transparent bg + white text
        }
    });

    if (window.scrollY > 100) {
        setScrolledState();
    } else {
        setUnscrolledState();
    }
} else {
    setOtherPagesState(); // all other pages → gray-200 bg + black text
}


    highlightActiveNavItem();
    handleMenuButtonVisibility();
});
</script>