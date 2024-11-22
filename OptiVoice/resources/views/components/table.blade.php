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
            @foreach($rows as $row)
                <tr class="hover:bg-gray-50">
                    @foreach($row as $cell)
                        <td class="px-4 py-2 border-b border-gray-300">
                            {!! $cell !!}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>