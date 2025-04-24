<x-layouts.app :title="__('Welcome')">
    <div id="content" role="main" class="content-area">
        <section class="section" name="banner" id="section_1771311065">
            <div class="relative">
                <img src="https://csereautoberles.hu/wp-content/uploads/2025/04/octavia.webp" alt="Car Image"
                    class="w-full h-auto object-cover">
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
                    <h1 class="text-4xl font-bold">CSEREAUTÓ FLOTTA</h1>
                    <a href="#"
                        class="mt-4 bg-red-500 text-white py-2 px-6 rounded-lg text-lg font-semibold">FOGLALJON MOST</a>
                </div>
            </div>
        </section>
        {{-- cars section --}}
        <section class="section" id="section_1771311065" class="">

            @livewire('cars-card')

        </section>
        <section class="section" id="section_960907427">
            {{-- home-services-card --}}
            <div class="max-w-[1470px] w-full flex flex-col items-center justify-center mx-auto">
                @livewire('home-services-card')
            </div>
        </section>
        <section class="section" id="section_283480582">
            {{-- usefull-knowledge --}}
            {{--  @livewire('usefull-knowledge') --}}

        </section>
        <section class="section bg-gray-100 py-8" id="section_contact_info">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl font-bold text-red-600 mb-4">Autóbérlés rezerváció és információ</h2>
                <p class="text-lg font-semibold">Fem-Cars Hungary Kft.</p>
                <p class="text-lg">2083 Solymár, Mátyás Király út 45.</p>
                <p class="text-lg">Telefon: <a href="tel:+36703788340" class="text-blue-500">+36 70 378 8340</a> | <a
                        href="tel:+36302118545" class="text-blue-500">+36 30 211 8545</a></p>
                <p class="text-lg">Nyitva tartás: <span class="font-bold">H-P: 8-17-ig</span></p>
            </div>
        </section>
    </div>
</x-layouts.app>
