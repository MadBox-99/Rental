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
        <section class="section" id="section_1771311065">
            @livewire('cars-card')
        </section>
        <section class="section" id="section_960907427">
            {{-- home-services-card --}}
            @livewire('home-services-card')
        </section>
        <section class="section" id="section_283480582">
            {{-- usefull-knowledge --}}
            @livewire('usefull-knowledge')
        </section>
    </div>
</x-layouts.app>
