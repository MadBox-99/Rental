<x-layouts.app>
    <div id="content" role="main" class="content-area">
        <div class="h-64 bg-cover bg-center"
            style="background-image: url('{{ Storage::url('csereauto-flotta.webp') }}');">
            <div class="h-full w-full bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-white text-3xl md:text-5xl font-bold uppercase">Csereautó flotta és foglalási naptár
                </h1>
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
                                <th colspan="2" class="px-4 py-2 border border-gray-300">Autó Model / április, május
                                    Napok</th>
                                @for ($i = 0; $i < 30; $i++)
                                    <th class="px-2 py-1 border border-gray-300">
                                        {{ now()->addDays($i)->format('m-d') }}
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr class="bg-white hover:bg-gray-100">
                                    <td class="px-4 py-2 border border-gray-300">
                                        <a href="#" class="block">
                                            <img src="{{ asset('images/cars/' . $car->id . '.png') }}"
                                                alt="{{ $car->model }}" class="h-12 mx-auto">
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        <a href="#" class="text-blue-600 hover:underline">{{ $car->brand }}
                                            {{ $car->model }}</a>
                                        <p class="text-gray-600">Rendelkezésre álló autók: {{ $car->transmission }}</p>
                                    </td>
                                    @for ($i = 0; $i < 30; $i++)
                                        @php
                                            $date = now()->addDays($i)->format('Y-m-d');
                                            $availability = $car->availabilities->firstWhere('date', $date);
                                        @endphp
                                        <td
                                            class="px-2 py-1 border border-gray-300 {{ $availability && $availability->is_available ? 'bg-green-100' : 'bg-red-100' }}">
                                            {{ $availability && $availability->is_available ? '1' : '0' }}
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
