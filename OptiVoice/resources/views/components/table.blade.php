<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                @foreach($headers as $header)
                    <th class="px-4 py-2 text-left">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @forelse($rows as $row)
                <tr class="hover:bg-gray-50">
                    @foreach($row as $key => $value)
                        @if($key !== 'actions') {{-- Ignorar columna de acciones aquí --}}
                            <td class="px-4 py-2 border-b border-gray-300">{{ $value }}</td>
                        @endif
                    @endforeach

                    {{-- Si hay acciones, las mostramos en una columna aparte --}}
                    @if(isset($row['actions']))
                        <td class="px-4 py-2 border-b border-gray-300">
                            {!! $row['actions'] !!}
                        </td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="px-4 py-2 text-center">
                        {{ __('No hay registros disponibles.') }}
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>