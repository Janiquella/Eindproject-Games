<x-layout title="edit">
    <h1>Edit the Game</h1>

    <form action="{{ route('games.update', $game) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Title</label>
            <input type="text" id="name" name="name" value="{{ $game->title }}"/>
            @error('name')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea type="text" id="description"
                      name="description">{{ old('description', $game->description) }}</textarea>
            @error('description')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="genre">Genre</label>
            {{--            <input type="text" id="genre" name="genre" value="{{ $game->genre_id }}"/>--}}
            <select name="genre" id="genre">
                @foreach($genres as $genre)
                    <option
                        value="{{ $genre->id }}" {{ old('genre', $game->genre_id) == $genre->id ? 'selected' : ''}}>{{ $genre->name }}</option>
                @endforeach
            </select>
            @error('genre')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        {{--        <input type="submit" value="Save"/>--}}
        <button type="submit" class="p-2 mt-3 bg-green-400 text-white rounded">Save Game</button>
    </form>
</x-layout>
