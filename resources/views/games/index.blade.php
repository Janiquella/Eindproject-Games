{{--<x-app-layout>--}}
{{--    --}}{{--    <div>--}}
{{--    --}}{{--        <div>--}}
{{--    --}}{{--            @foreach($games as $game)--}}
{{--    --}}{{--                                <x-game : --}}
{{--    --}}{{--            @endforeach--}}
{{--    --}}{{--        </div>--}}
{{--    --}}{{--    </div>--}}

{{--
{{--    <h1>Welcome to the home page</h1>--}}
{{--    <div>--}}
{{--        {{ $game->title }}--}}
{{--        {{ $game->genre }}--}}
{{--    </div>--}}
{{--</x-app-layout>--}}

<x-layout title="Games">
    <h1>Games page</h1>
    <div>
        {{ $game->title }}
        {{ $game->genre }}
    </div>
</x-layout>
