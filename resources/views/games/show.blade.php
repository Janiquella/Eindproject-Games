{{--{{$name}}--}}
<x-layout title="{{$game->title}}">

    <p>
        {{$game->title}} ||
        {{$game->genre->name}} ||
        {{$game->description}}
    </p>

    <div>
        <label for="review">Review</label>
        <input type="text" id="review" name="review" value="{{ old('review') }}"/>
        @error('review')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <a href="{{ route('games.edit', $game) }}" class="p-2 mt-3 bg-gray-600 text-white rounded">Edit game</a>
    </div>

    <div>
        <form action="{{ route('games.destroy', $game) }}" method="post">
            @method('DELETE')
            <button type="submit" class="p-2 mt-3 bg-red-600 text-white rounded">Delete game</button>
        </form>
    </div>
</x-layout>
