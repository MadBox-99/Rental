<div>
    @foreach ($availabilities as $availability)
        <td
            class="px-2 py-1 border border-gray-300 {{ $availability && $availability->is_available ? 'bg-green-100' : 'bg-red-100' }}">
            @if ($availability && $availability->is_available)
                <span class="text-green-600">Elérhető</span>
            @else
                <span class="text-red-600">Nem elérhető</span>
            @endif
        </td>
    @endforeach
</div>
