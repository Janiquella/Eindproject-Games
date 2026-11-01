<x-layout>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>genre</th>
            <th>description</th>
            <th>status</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td>{{$game->id}}</td>
                <td>{{}}</td>
                <td>{{}}</td>
                <td>{{}}</td>
                <td>{{}}</td>
                <td>{{}}</td>
                <td>
                    <form action="{{route('admin.status', $game)}}" method="post">
                        <button type="submit">Active</button>
                    </form>
                    <form action="{{ route('admin.destroy', $game) }}" method="post">
                        @method('DELETE')
                        <button type="submit" class="p-2 mt-3 bg-red-600 text-white rounded">Delete game</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layout>
