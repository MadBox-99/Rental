<x-layouts.app>
    <div class="relative">
        <!-- Header Image -->
        <div class="h-64 bg-cover bg-center"
            style="background-image: url('{{ Storage::url('csereauto-flotta.webp') }}');">
            <div class="h-full w-full bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-white text-3xl md:text-5xl font-bold">BÉRLETI FELTÉTELEK</h1>
            </div>
        </div>

        <!-- Content Section -->
        <div class="container mx-auto py-12 px-4 md:px-8">
            <h2 class="text-red-600 text-2xl font-bold mb-6">Bérleti feltételek</h2>
            <p class="mb-6">Szolgáltatásunk célja, hogy Ön a javítás ideje alatt is kényelmesen, rugalmasan intézhesse
                mindennapi teendőit. Az alábbi feltételek a csereautó bérlésére vonatkoznak:</p>

            <!-- Two-column layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Column 1 -->
                <div class="space-y-8">
                    <div>
                        <h3 class="text-red-600 text-xl font-bold mb-4">1. Ki bérelhet csereautót?</h3>
                        <ul class="list-disc list-inside space-y-2">
                            <li>Minimum 21 éves életkor</li>
                            <li>Érvényes személyi igazolvány vagy útlevél</li>
                            <li>Legalább 1 éve érvényes „B” kategóriás vezetői engedély</li>
                            <li>Érvényes szervizidőpont valamelyik partner autószervizünknél</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-red-600 text-xl font-bold mb-4">2. Bérleti időszak</h3>
                        <ul class="list-disc list-inside space-y-2">
                            <li>A csereautó a javítás teljes időtartamára igénybe vehető.</li>
                            <li>A bérleti idő kezdete a gépjármű átvételének napja, vége pedig a visszaadás napja.</li>
                            <li>A bérleti idő meghosszabbítására külön egyeztetés alapján van lehetőség.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-red-600 text-xl font-bold mb-4">3. Díjszabás és fizetés</h3>
                        <ul class="list-disc list-inside space-y-2">
                            <li>A bérleti díj szervizpartnereinknél előre egyeztetve, napi vagy csomagárban kerül
                                meghatározásra.</li>
                            <li>Az ár tartalmazza a kötelező biztosítást, a szervizelést és az assistance szolgáltatást.
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="space-y-8">
                    <div>
                        <h3 class="text-red-600 text-xl font-bold mb-4">4. Gépjárműhasználat</h3>
                        <ul class="list-disc list-inside space-y-2">
                            <li>A jármű kizárólag Magyarország területén használható.</li>
                            <li>A jármű csak a bérlő vagy a szerződésben megjelölt második vezető által vezethető.</li>
                            <li>Tilos a járművet versenyen, oktatáson, terepen, illetve engedély nélküli fuvarozásra
                                használni.</li>
                            <li>A bérlő felelős a jármű állapotáért, tisztaságáért, és minden okozott kárért.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-red-600 text-xl font-bold mb-4">5. Visszaadás</h3>
                        <ul class="list-disc list-inside space-y-2">
                            <li>A járművet a megadott időpontra, a bérléskor rögzített helyszínen kérjük visszaadni.
                            </li>
                            <li>Késedelmes visszaadásért esetén óradíjat számolhatunk fel.</li>
                            <li>Sérülés vagy rendellenesség esetén kérjük, azonnal jelezze ügyfélszolgálatunkon.</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-red-600 text-xl font-bold mb-4">6. Egyéb tudnivalók</h3>
                        <ul class="list-disc list-inside space-y-2">
                            <li>Ügyfeleink részére 0–24 órás telefonos ügyfélszolgálat áll rendelkezésre.</li>
                            <li>A bérleti szerződés aláírása előtt minden feltételről részletes tájékoztatást adunk.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
