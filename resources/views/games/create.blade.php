<x-layout title="create">
    <h1>Create new Game</h1>

    <form action="{{ route('game.store') }}" method="post">
        @csrf
        <div>
            <label for="name">Title</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"/>
            @error('name')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea type="text" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="genre">Genre</label>
            {{--            <input type="text" id="genre" name="genre" value="{{ old('genre') }}"/>--}}
            <select name="genre" id="genre">
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            @error('genre')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

        {{--        <input type="submit" value="Save"/>--}}
        <button type="submit">Add Game</button>
    </form>
</x-layout>
