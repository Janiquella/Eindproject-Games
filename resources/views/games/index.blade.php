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
        <input type="text" name="search" id="search" value="{{request('search')}}" class="search-bar"
               placeholder="search game">
        <button type="submit" class="p-2 mt-3 text-black bg-green-300 rounded">Search</button>
    </form>

    @if($games->isEmpty())
        <p>No result</p>
    @else
        @foreach($games as $game)
            <section class="card bottom-3">
                <div>{{$game->title}} || {{$game->genre->name}}</div>
                <a href="{{route('games.show', $game)}}">Detail</a>
            </section>
        @endforeach
    @endif

    {{--    <div class="card bottom-3">--}}
    {{--        @foreach($games as $game)--}}
    {{--                        <div>{{$game->title}} || {{$game->genre->name}}</div>--}}
    {{--            <a href="{{route('games.show', $game)}}">Details</a>--}}
    {{--        @endforeach--}}
    {{--    </div>--}}
</x-layout>
