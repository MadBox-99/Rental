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
                                        <a href="{{ route('cars.show', ['slug' => $car->slug]) }}"
                                            class="block w-24 h-12 mx-auto">
                                            @empty($car->images)
                                                <img src="https://placehold.co/600x400?text=Hello+World"
                                                    alt="Default Car Image" class="h-12 mx-auto w-24">
                                            @else
                                                <img src="{{ asset('storage' . $car->images[0]) }}" alt="Car Image"
                                                    class="h-12 mx-auto w-24">
                                            @endempty
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 border border-gray-300">
                                        <a
                                            href="{{ route('cars.show', ['slug' => $car->slug]) }}"class="text-blue-600 hover:underline">{{ $car->brand }}
                                            {{ $car->model }}</a>
                                        {{--  <p class="text-gray-600">Rendelkezésre álló autók: {{ $car->transmission }}</p> --}}
                                    </td>

                                    @livewire('car-availability-calendar', ['car' => $car, 'displayDays' => 30])

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-layouts.app>
