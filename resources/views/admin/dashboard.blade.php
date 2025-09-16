<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.Name','Alfanzoo Resort')}}</title>
  <link rel="icon" type="image/png" href="{{asset('frontend/images/logo/logo.png')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-0 invisible transition-opacity duration-200 z-40"></div>

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 space-y-2 py-4 px-2 fixed h-full transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50">
    <div class="text-xl font-bold text-center  flex items-center justify-between px-4">
        <span class="text-orange-400"> Admin Dashboard</span>
        <!-- Close button for mobile -->
        <button id="closeSidebar" class="md:hidden text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <nav>
        <a href="{{url('/')}}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span>Home</span>
        </a>

        <!-- About Us -->
        <a href="{{ ('aboutus') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>About Us</span>
        </a>




        <!-- Menu -->
        <a href="{{route('menu.index') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Menu</span>
        </a>
        <!--Rooms-->
         <a href="{{ route('rooms.index') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7a2 2 0 002 2z" />
            </svg>
            <span>Rooms</span>



       <a href="{{ route('gallery.index') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 5h16c.552 0 1 .448 1 1v12c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V6c0-.552.448-1 1-1z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 15l4-4 4 4 4-4 4 4" />
                <circle cx="8" cy="8" r="2" stroke="currentColor" stroke-width="2"/>
            </svg>
            <span>Gallery</span>
        </a>

         <!-- FAQs -->
        <a href="{{ ('faqs.index') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>FAQs</span>
        </a>

        <!-- Existing Items -->
         <a href="{{ route('admin.contacts.index') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.001 10.001 0 0112 2a10.001 10.001 0 016.879 15.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Contacts</span>
            @isset($unreadContactCount)
                @if ($unreadContactCount > 0)
                    <span class="bg-red-500 text-white text-sm rounded-full px-2 py-1 ml-2">
                        {{ $unreadContactCount }}
                    </span>
                @endif
            @endisset
        </a>
         <a href="{{ route('admin.table.index') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.001 10.001 0 0112 2a10.001 10.001 0 016.879 15.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Table Booking</span>
            @isset($unreadTableCount)
                @if ($unreadTableCount > 0)
                    <span class="bg-red-500 text-white text-sm rounded-full px-2 py-1 ml-2">
                        {{ $unreadTableCount }}
                    </span>
                @endif
            @endisset
        </a>

       <a href="{{ route('admin.booking.index') }}" class="flex items-center space-x-2 px-4 py-3 hover:bg-gray-700 rounded">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <span>Room Booking</span>
            @if($unreadBookingCount = \App\Models\Booking::where('is_read', false)->count())
                <span class="bg-red-500 text-white text-sm rounded-full px-2 py-1 ml-2">
                    {{ $unreadBookingCount }}
                </span>
            @endif
        </a>
    </nav>
</aside>

        <!-- Main Content -->
        <div class="ml-0 md:ml-64 flex-1">
            <!-- Header -->
            <header class="bg-white shadow-sm z-30 relative">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <!-- Hamburger button for mobile -->
                        <button id="menuBtn" class="md:hidden mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        
                    </div>
                    <!-- Header right content -->
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-600 hover:text-gray-800">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2">
                               
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-sm text-gray-700 font-bold hover:text-gray-900">
                                        Log Out
                                    </button>
                                </form>
                                
                            </button>
                        </div>
                    </div>


                </div>
            </header>

            <!-- Dashboard Stats Boxes -->
{{-- <article class="max-w-[90%] mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8"> <!-- Increased gap to 8 -->
        

        <!-- Contacts Box -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-8 text-white hover:bg-gray-700 transition duration-200 h-full min-h-[180px] flex flex-col justify-between">
            <a href="{{ route('admin.contacts.index') }}" class="flex flex-col h-full justify-between">
                <div class="flex items-center space-x-6">
                    <div class="p-4 rounded-full bg-gray-700 relative">
                        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.001 10.001 0 0112 2a10.001 10.001 0 016.879 15.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        @if(isset($unreadContactCount) && $unreadContactCount > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-sm rounded-full h-6 w-6 flex items-center justify-center animate-pulse">
                            {{ $unreadContactCount }}
                        </span>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold">Contacts</h3>
                        <p class="text-gray-300 text-base mt-2">{{ $unreadContactCount ?? 0 }} Unread</p>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>
        </div>

        <!-- Enrollments Box -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-8 text-white hover:bg-gray-700 transition duration-200 h-full min-h-[180px] flex flex-col justify-between">
            <a href="{{ route('admin.booking.index') }}" class="flex flex-col h-full justify-between">
                <div class="flex items-center space-x-6">
                    <div class="p-4 rounded-full bg-gray-700 relative">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        @if(isset($unreadBookingCount) && $unreadBookingCount > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-sm rounded-full h-6 w-6 flex items-center justify-center animate-pulse">
                            {{ $unreadBookingCount }}
                        </span>
                        @endif
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold">Booking</h3>
                        <p class="text-gray-300 text-base mt-2">{{ $unreadBookingCount ?? 0 }} New</p>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </a>
        </div>
    </div>
</article> --}}

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menuBtn');
            const closeSidebarBtn = document.getElementById('closeSidebar');
            const sidebar = document.querySelector('aside');
            const overlay = document.getElementById('overlay');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                overlay.classList.remove('opacity-0', 'invisible');
                overlay.classList.add('opacity-50', 'visible');
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                overlay.classList.add('opacity-0', 'invisible');
                overlay.classList.remove('opacity-50', 'visible');
            }

            // Event listeners
            menuBtn.addEventListener('click', openSidebar);
            closeSidebarBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);

            // Close sidebar when clicking nav links on mobile
            document.querySelectorAll('nav a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) closeSidebar();
                });
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    // Reset desktop styles
                    sidebar.classList.remove('-translate-x-full', 'translate-x-0');
                    sidebar.classList.add('translate-x-0');
                    overlay.classList.add('opacity-0', 'invisible');
                } else {
                    // Ensure mobile state if resized smaller
                    if (!sidebar.classList.contains('-translate-x-full')) {
                        closeSidebar();
                    }
                }
            });
        });
    </script>
</body>

</html>