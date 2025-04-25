<footer class="bg-gray-800 text-white pt-8">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Company Info -->
        <div>
            <div class="flex items-center mb-4">
                <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Fem-Cars Logo" class="h-12 mr-3">
                <span class="text-xl font-bold">Fem-Cars Hungary Kft.</span>
            </div>
            <p class="text-sm">2083 Solymár, Mátyás Király út 45.</p>
            <p class="text-sm">Telefon: +36 70 378 8340 | 36 30 211 8545</p>
            <p class="text-sm">Nyitva tartás: H-P: 8-17-ig</p>
        </div>

        <!-- Menu -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Menü</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="hover:underline">Főoldal</a></li>
                <li><a href="{{ route('csereauto-flotta') }}" class="hover:underline">Csereautó flotta</a></li>
                <li><a href="{{ route('berleti-feltetelek') }}" class="hover:underline">Bérleti feltételek</a></li>
                <li><a href="{{ route('szolgaltatasaink') }}" class="hover:underline">Szolgáltatások</a></li>
                <li><a href="{{ route('csatlakozasi-lehetoseg') }}" class="hover:underline">Csatlakozási lehetőség</a>
                </li>
                <li><a href="{{ route('kapcsolat') }}" class="hover:underline">Elérhetőség</a></li>
            </ul>
        </div>

        <!-- Legal Documents -->
        <div>
            <h3 class="text-lg font-semibold mb-4">Jog dokumentumok</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="#" class="hover:underline">Adatvédelmi nyilatkozat</a></li>
                <li><a href="#" class="hover:underline">ÁSZF</a></li>
            </ul>
        </div>
    </div>

    <div
        class="border-t bg-black border-gray-700 mt-8 pt-4 text-center text-sm flex flex-col md:flex-row justify-between items-center h-full">
        <p class="mb-2 md:mb-0">Minden jog fenntartva ©2025 <span class="font-bold">FEM-CARS KFT.</span></p>
        <div class="flex items-center space-x-2">
            <p>Weboldalt készítette:</p>
            <a href="#" class="text-blue-400 hover:underline flex items-center">
                <img src="{{ Storage::url('cegem360logo-white.webp') }}" alt="céges360" class="h-5 mr-1">
                <span>céges360</span>
            </a>
        </div>
    </div>
</footer>
