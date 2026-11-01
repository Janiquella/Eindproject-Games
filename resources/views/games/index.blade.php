<x-layout title="Games">
    <h1>Games page</h1>
    {{--    @if()--}}
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
        {{--        @endif--}}
    </form>

    @if($games->isEmpty())
        <p>No result</p>
    @else
        @foreach($games as $game)
            <section class="card bottom-3">
                <img src="{{asset('storage/' . $game->image)}}" class="w-32 h-auto">
                <div>{{$game->title}} || {{$game->genre->name}}</div>
                <a href="{{route('games.show', $game)}}">Details</a>

                {{--                @auth--}}
                {{--                    @if(auth()->user()->role ===1)--}}
                {{--                        <form action="{{ route('games.status', $game) }}" method="post">--}}
                {{--                            @csrf--}}
                {{--                            @method('PATCH')--}}
                {{--                            <button type="submit" class="p-2 mt-3 bg-blue-400 text-white rounded">--}}
                {{--                                {{ $game->status ? 'Show' : 'Hide' }}--}}
                {{--                            </button>--}}
                {{--                        </form>--}}
                {{--                    @endif--}}
                {{--                @endauth--}}
            </section>
        @endforeach
    @endif
</x-layout>
