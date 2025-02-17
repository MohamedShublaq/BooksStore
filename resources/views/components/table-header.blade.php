<thead>
    <tr>
        <th class="text-center">
            <input type="checkbox" id="select-all">
        </th>
        <th class="text-center">#</th>
        @foreach ($headers as $header)
            <th class="text-center">{{ $header }}</th>
        @endforeach
        <th class="text-center">{{__('actions.actions')}}</th>
    </tr>
</thead>
