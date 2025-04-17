<div class="container mx-auto py-12">
    <div class="flex flex-col md:flex-row items-center md:items-start">
        <!-- Car Image -->
        <div class="w-full md:w-1/2">
            <img src="{{ asset('images/cars/' . $car->id . '.png') }}" alt="{{ $car->model }}" class="w-full h-auto">
        </div>

        <!-- Car Details -->
        <div class="w-full md:w-1/2 md:pl-8">
            <h1 class="text-3xl font-bold text-red-600">{{ $car->brand }} {{ $car->model }}</h1>

            <div class="mt-4">
                <p><strong>Osztály:</strong> Első osztály</p>
                <p><strong>Üzemanyag:</strong> Benzin</p>
                <p><strong>Üzemanyag használat:</strong> 265 LE</p>
                <p><strong>Távolság:</strong> Korlátlan</p>
            </div>

            <div class="mt-6">
                <h2 class="text-xl font-semibold">További információk</h2>
                <ul class="list-disc list-inside mt-2">
                    <li>Klíma</li>
                    <li>Elektromos ablakok</li>
                    <li>Biztonsági funkciók: ABS, ESP, tempomat</li>
                    <li>4 kerék meghajtás</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Availability Table -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold text-left mb-4">Autók elérhetősége a következő 30 napban</h2>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300 text-sm text-center">
                <thead class="bg-red-600 text-white">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">
                            Model elérhető
                            /{{ __('calendar.month_range', [
                                'current' => Str::title(now()->locale('hu')->translatedFormat('F')),
                                'next' => Str::title(now()->addDays(29)->locale('hu')->translatedFormat('F')),
                            ]) }}
                        </th>
                        @for ($i = 0; $i < 30; $i++)
                            <th class="px-2 py-1 border border-gray-300">
                                {{ today()->addDays($i)->format('d') }}
                            </th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        {{-- <td class="px-4 py-2 border border-gray-300 font-bold text-red-600">
                            {{ $car->brand }} {{ $car->model }}
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
                        @endfor --}}
                        <td class="px-4 py-2 border border-gray-300 font-bold text-red-600">
                            {{ $car->brand }} {{ $car->model }}
                        </td>
                        @livewire('car-availability-calendar', [
                            'car' => $car,
                            'displayDays' => 30,
                        ])
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Description -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold text-center mb-4">{{ $car->brand }} {{ $car->model }}</h2>
        <p class="text-gray-700 mb-4">{{ $car->description }}</p>

        <h3 class="text-xl font-semibold mb-2">Főbb jellemzők:</h3>
        <ul class="list-disc list-inside text-gray-700">
            <li>Kiemelkedően tágas utastér</li>
            <li>Kifinomult, mégis modern külső megjelenés</li>
            <li>Automata váltó és vezetéstámogató rendszerek</li>
            <li>Prémium komfort: ülésfűtés, klímazóna, navigáció</li>
            <li>Nagyméretű csomagtartó – tökéletes hosszabb utakhoz is</li>
            <li>Halk, kényelmes futás minden útípuson</li>
        </ul>

        <p class="mt-4 text-gray-700">Bérelje ki a <strong>{{ $car->brand }} {{ $car->model }}</strong>-et, ha nem
            szeretne kompromisszumot kötni a kényelem, a megjelenés és a vezetési élmény terén. Ez a modell minden
            tekintetben magas színvonalat képvisel – Önnek csak annyi a dolga, hogy élvezze az utazást.</p>
    </div>

    <!-- Social Sharing Links -->
    <div class="mt-6 flex justify-center space-x-4">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"
            class="text-blue-600">
            <i class="fab fa-facebook fa-2x"></i>
        </a>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($car->brand . ' ' . $car->model) }}"
            target="_blank" class="text-blue-400">
            <i class="fab fa-twitter fa-2x"></i>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($car->brand . ' ' . $car->model) }}"
            target="_blank" class="text-blue-700">
            <i class="fab fa-linkedin fa-2x"></i>
        </a>
    </div>
</div>
