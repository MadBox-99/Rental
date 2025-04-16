<x-layouts.app>
    <div id="content" role="main" class="content-area">

        <!-- Page Header -->
        <div id="page-header" class="relative bg-cover bg-center h-[300px]" style="background-image: url('https://csereautoberles.hu/wp-content/uploads/2025/04/4ac9b12db22b711b644e3ae9361fdc3b.webp');">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="container mx-auto flex flex-col items-center justify-center h-full text-white text-center">
                <h1 class="text-4xl font-bold uppercase">Csereautó flotta és foglalási naptár</h1>
            </div>
        </div>

        <!-- Section -->
        <section class="py-12">
            <div class="container mx-auto">
                <!-- Title -->
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-semibold">Autók elérhetősége a következő 30 napban</h2>
                    <hr class="my-4 border-red-600 w-1/4 mx-auto">
                </div>

                <!-- Availability Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-gray-300 text-sm text-center">
                        <thead class="bg-gray-100">
                            <tr>
                                <th colspan="2" class="px-4 py-2 border border-gray-300">Autó Model / április, május Napok</th>
                                @for ($i = 16; $i <= 30; $i++)
                                    <th class="px-2 py-1 border border-gray-300">{{ $i }}</th>
                                @endfor
                                @for ($i = 1; $i <= 15; $i++)
                                    <th class="px-2 py-1 border border-gray-300">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr class="bg-white hover:bg-gray-100">
                                <td class="px-4 py-2 border border-gray-300">
                                    <a href="https://csereautoberles.hu/wp-content/uploads/CarRentalGallery/front-1-1.png" class="block">
                                        <img src="https://csereautoberles.hu/wp-content/uploads/CarRentalGallery/mini_thumb_front-1-1.png" alt="Skoda Octavia" class="h-12 mx-auto">
                                    </a>
                                </td>
                                <td class="px-4 py-2 border border-gray-300">
                                    <a href="https://csereautoberles.hu/auto-model/skoda-octavia/" class="text-blue-600 hover:underline">Skoda Octavia</a>
                                    <p class="text-gray-600">Rendelkezésre álló autók: Automata</p>
                                </td>
                                @for ($i = 1; $i <= 30; $i++)
                                    <td class="px-2 py-1 border border-gray-300 {{ $i % 2 == 0 ? 'bg-green-100' : 'bg-red-100' }}">
                                        {{ $i % 2 == 0 ? '1' : '0' }}
                                    </td>
                                @endfor
                            </tr>
                            <!-- Add more rows dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>