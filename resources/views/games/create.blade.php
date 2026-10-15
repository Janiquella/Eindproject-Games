{{--<x-app-layout>--}}
<h1>Create new Game</h1>

<form action="{{ route('game.store') }}" method="post">
    <div>
        <label for="name">Title</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"/>
        @error('name')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description" value="{{ old('description') }}"/>
        @error('description')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" value="{{ old('genre') }}"/>
        @error('genre')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <input type="submit" value="Save"/>
</form>
{{--</x-app-layout>--}}
