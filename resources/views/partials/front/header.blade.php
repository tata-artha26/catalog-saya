<header class="bg-gray-dark sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('front/images/template-white-logo.png') }}" alt="{{ config('app.name') }}" class="h-14 w-auto mr-4">
        </a>

        <div class="flex lg:hidden">
            <button id="hamburger" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <nav class="hidden lg:flex md:flex-grow justify-center">
            <ul class="flex justify-center space-x-4 text-white">
                <li><a href="{{ route('home') }}" class="hover:text-secondary font-semibold">Home</a></li>
                <li><a href="#" class="hover:text-secondary font-semibold">Shop</a></li>
                <li><a href="#" class="hover:text-secondary font-semibold">Product</a></li>
                <li><a href="#" class="hover:text-secondary font-semibold">Checkout</a></li>
                <li><a href="#" class="hover:text-secondary font-semibold">About</a></li>
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-secondary font-semibold">Admin</a></li>
            </ul>
        </nav>

        <div class="hidden lg:flex items-center space-x-4 relative">
            <a href="#"
                class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Register</a>
            <a href="#"
                class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Login</a>
            <a href="#" class="text-white hover:text-secondary group">
                <img src="{{ asset('front/images/search-icon.svg') }}" alt="Search"
                    class="h-6 w-6 transition-transform transform group-hover:scale-120">
            </a>
        </div>
    </div>
</header>

<nav id="mobile-menu" class="mobile-menu hidden flex-col items-center space-y-8 lg:hidden">
    <ul class="w-full">
        <li><a href="{{ route('home') }}" class="hover:text-secondary font-bold block py-2">Home</a></li>
        <li><a href="#" class="hover:text-secondary font-bold block py-2">Shop</a></li>
        <li><a href="#" class="hover:text-secondary font-bold block py-2">Product</a></li>
        <li><a href="#" class="hover:text-secondary font-bold block py-2">Checkout</a></li>
        <li><a href="#" class="hover:text-secondary font-bold block py-2">About</a></li>
    </ul>
</nav>