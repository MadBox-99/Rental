<div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-gray-100 p-6">
    @foreach ($cars as $car)
        <div class="bg-white rounded-lg shadow-md p-6 text-center flex flex-col justify-between"
            style="min-height: 650px;">
            <div>
                @empty($cars->images)
                    <img src="https://placehold.co/600x400?text=Hello+World" alt="Default Car Image" class="w-full h-auto">
                @else
                    <img src="{{ Vite::asset($car->images[0]) }}" alt="{{ $car->brand }} {{ $car->model }}"
                        class="mx-auto mb-4">
                @endempty
                <h3 class="text-red-600 font-bold text-lg py-5 my-2">{{ $car->brand }} {{ $car->model }}</h3>
                <p class="text-gray-700  mb-4 text-left text-lg font-semibold">
                    {{ $car->short_description }}
                </p>
                <div>
                    <a href="{{ route('cars.show', ['slug' => $car->slug]) }}"
                        class="bg-red-500 text-white py-2 px-4 rounded-lg">MEGNÉZEM</a>
                </div>
            </div>
        </div>
    @endforeach

</div>
