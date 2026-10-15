{{$name}}
<div>
    <button>Delete</button>
    <form action="{{ route('games.destroy', $game) }}" method="post">
        @method('DELETE')
        <button type="submit" class="p-2 mt-3 bg-red-600 text-white rounded"></button>
    </form>
</div>
