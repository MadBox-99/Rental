{{-- filepath: resources/views/components/available-cars-chart.blade.php --}}
@vite('resources/css/app.css')
<div class="overflow-x-auto">
    <table class="table-auto border-collapse border border-gray-300 w-full text-sm dark:border-gray-700">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2 bg-gray-100 dark:bg-gray-800 dark:text-gray-200"
                    style="width: 50px; height: 50px;">Model
                </th>
                @foreach ($dates as $date)
                    <th class="border border-gray-300 px-4 py-2 bg-gray-100 dark:bg-gray-800 dark:text-gray-200"
                        style="width: 50px; height: 50px;">
                        {{ $date->format('d') }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200"
                        style="width: 50px; height: 50px;">
                        {{ $car->model }}
                    </td>
                    @foreach ($dates as $date)
                        <td class="border border-gray-300 px-4 py-2 text-center {{ $car->isAvailable($date) ? 'bg-green-500' : 'bg-red-500' }} dark:border-gray-700"
                            style="width: 50px; height: 50px;">
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
