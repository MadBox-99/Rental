{{-- filepath: /Users/szabozoltan/Herd/Rental/resources/views/components/layouts/navbar.blade.php --}}
<nav class="bg-white text shadow-md">
    <div class="container mx-auto flex items-center justify-between py-4">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="https://csereautoberles.hu/" title="FEM CARS Csereautó bérlés" class="flex items-center">
                <img src="https://csereautoberles.hu/wp-content/uploads/2025/04/femcars_piros_logo.png" alt="FEM CARS Csereautó bérlés" class="h-12">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <ul class="hidden md:flex space-x-6 text-sm font-medium uppercase">
            <li><a href="/" class="hover:text-red-600">Főoldal</a></li>
            <li><a href="/csereauto-flotta" class="hover:text-red-600">Flotta és foglalási naptár</a></li>
            <li><a href="/berleti-feltetelek" class="hover:text-red-600">Bérleti feltételek</a></li>
            <li><a href="/szolgaltatasaink" class="hover:text-red-600">Szolgáltatásaink</a></li>
            <li><a href="/csatlakozasi-lehetoseg" class="hover:text-red-600">Csatlakozási lehetőség</a></li>
            <li><a href="/kapcsolat" class="hover:text-red-600">Kapcsolat</a></li>
        </ul>

        <!-- Call to Action Button -->
        <div class="hidden md:block">
            <a href="/szerzodesek" class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700">
                Szerződés
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-toggle" class="text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
        <ul class="flex flex-col space-y-4 text-sm font-medium uppercase p-4">
            <li><a href="/" class="hover:text-red-600">Főoldal</a></li>
            <li><a href="/csereauto-flotta" class="hover:text-red-600">Flotta és foglalási naptár</a></li>
            <li><a href="/berleti-feltetelek" class="hover:text-red-600">Bérleti feltételek</a></li>
            <li><a href="/szolgaltatasaink" class="hover:text-red-600">Szolgáltatásaink</a></li>
            <li><a href="/csatlakozasi-lehetoseg" class="hover:text-red-600">Csatlakozási lehetőség</a></li>
            <li><a href="/kapcsolat" class="hover:text-red-600">Kapcsolat</a></li>
            <li>
                <a href="/szerzodesek" class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700 block text-center">
                    Szerződés
                </a>
            </li>
        </ul>
    </div>
</nav>