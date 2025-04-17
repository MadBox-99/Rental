<div>
    @foreach ($availabilities as $availability)
        <td
            class="px-2 py-1 border border-gray-300 {{ $availability && $availability->is_available ? 'bg-green-100' : 'bg-red-100' }}">
            {{ $availability && $availability->is_available ? '1' : '0' }}
        </td>
    @endforeach
</div>
