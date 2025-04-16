<x-layouts.app>
    <div class="relative">
        <!-- Header Image -->

        <div class="h-64 bg-cover bg-center"
            style="background-image: url('{{ Storage::url('csereauto-flotta.webp') }}');">
            <div class="h-full w-full bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-white text-3xl md:text-5xl font-bold uppercase">Szolgáltatásaink
                </h1>
            </div>
        </div>

        <!-- Content Section -->
        <div class="container mx-auto py-12 px-4 md:px-8">
            <h2 class="text-red-600 text-2xl font-bold mb-6">Szolgáltatásaink</h2>
            <p class="mb-6">Csereautó, amikor szüksége van rá</p>
            <p class="mb-6">Autószerviz? Baleset? Váratlan javítás? Mi gondoskodunk arról, hogy Ön addig se maradjon
                mobilitás nélkül. Szolgáltatásunk keretében kényelmesen bérelhet csereautót közvetlenül partner
                autószervizében – így nem kell plusz időt és energiát fordítania az ügyintézésre.</p>

            <!-- Two-column layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div>
                    <h3 class="text-red-600 text-xl font-bold mb-4">Hogyan működik?</h3>
                    <ol class="list-decimal list-inside space-y-4">
                        <li><strong>Időpontfoglalás a szervizbe</strong><br>Amint partner autószervizénél bejelentkezett
                            javításra, lehetősége van nálunk csereautót igényelni.</li>
                        <li><strong>Átvétel helyben, a szerviznél</strong><br>A bérautót a legtöbb esetben közvetlenül a
                            szerviznél veheti át, amikor leadja saját járművét.</li>
                        <li><strong>Kényelmes használat</strong><br>Csereautóink fiatal, megbízható, jól felszerelt
                            járművek. Az autót a szervizelés ideje alatt szabadon használhatja.</li>
                        <li><strong>Visszaadás egyszerűen</strong><br>Amikor elkészül az autója, csak hozza vissza a
                            cserejárművet, és folytathatja útját saját autójával.</li>
                    </ol>
                    <img src="https://csereautoberles.hu/wp-content/uploads/2025/04/happy-woman-takes-the-key-to-new-car-in-showroom-2024-11-30-03-20-20-utc-1024x684.webp"
                        alt="Car Rental Process" class="mt-6 rounded-lg shadow-lg">
                </div>

                <!-- Right Column -->
                <div>
                    <img src="https://csereautoberles.hu/wp-content/uploads/2025/04/ready-for-test-drive-handsome-young-car-salesman-2025-02-22-16-09-31-utc-1024x682.webp"
                        alt="Car Service" class="mb-6 rounded-lg shadow-lg">
                    <h3 class="text-red-600 text-xl font-bold mb-4">Miért érdemes minket választani?</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Gyors ügyintézés</strong> – nincs felesleges papírmunka vagy hosszú várakozás.</li>
                        <li><strong>Szervizhez igazodó rugalmasság</strong> – ameddig tart a javítás, nálunk biztosított
                            az autó.</li>
                        <li><strong>Fix, átlátható árak</strong> – nincsenek rejtett költségek.</li>
                        <li><strong>Ügyfélszolgálat a nap 24 órájában</strong> – ha bármi kérdése van, mi elérhetők
                            vagyunk.</li>
                    </ul>
                    <h3 class="text-red-600 text-xl font-bold mt-6 mb-4">Típusválaszték</h3>
                    <p>Kínálatunkban többféle jármű közül választhat, az alapmodellektől a családi kombikig. Minden autó
                        rendszeresen karbantartott és tisztán kerül átadásra.</p>
                    <p class="mt-4 font-bold">Ne mondjon le a kényelméről akkor sem, amikor autója szervizben
                        van!<br>Béreljen csereautót gyorsan, egyszerűen – mi minden mást intézünk.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
