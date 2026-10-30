{{--<x-app-layout>--}}
{{--    --}}{{--    <div>--}}
{{--    --}}{{--        <div>--}}
{{--    --}}{{--            @foreach($games as $game)--}}
{{--                                    <x-game :game="$game" /> --}}
{{--    --}}{{--            @endforeach--}}
{{--    --}}{{--        </div>--}}
{{--    --}}{{--    </div>--}}
{{--</x-app-layout>--}}

<x-layout title="Games">
    <h1>Games page</h1>

    <form action="{{route('games.search')}}" method="GET">
        <select name="genre" id="genre">
            <option value="">All genres</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}"@selected(request('genre') == $genre->id)>{{ $genre->name }}</option>
            @endforeach
        </select>

        <input type="text" name="search" id="search" value="{{request('search')}}" class="search-bar"
               placeholder="search game">
        <button type="submit" class="p-2 mt-3 text-black bg-green-300 rounded">Search</button>
    </form>

    @if($games->isEmpty())
        <p>No result</p>
    @else
        @foreach($games as $game)
            <section class="card bottom-3">
                <img src="{{asset('storage/' . $game->image)}}" class="w-32 h-auto">
                <div>{{$game->title}} || {{$game->genre->name}}</div>
                <a href="{{route('games.show', $game)}}">Detail</a>
            </section>
        @endforeach
    @endif
</x-layout>
