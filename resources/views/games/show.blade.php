{{--{{$name}}--}}
<x-layout title="{{$game->title}}">

    <p>
        <img src="{{asset('storage/' . $game->image)}}" class="w-32 h-auto">
        {{$game->title}} ||
        {{$game->genre->name}} ||
        {{$game->description}}
    </p>
    <h3>Reviews</h3>

    @if($game->reviews->isEmpty())
        <p>No reviews yet.</p>
    @else
        @foreach($game->reviews as $review)
            <div class="border p-3 my-2 rounded">
                <p><strong>{{ $review->user->name }}</strong></p>
                <p>Rating: {{ $review->rating }}/5</p>
                <p>{{ $review->review }}</p>

                @if(auth()->check() && auth()->id() === $review->user_id)
                    <form action="{{ route('reviews.destroy', $review) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 mt-3 bg-red-600 text-white rounded">Delete review</button>
                    </form>
                @endif
            </div>
        @endforeach
    @endif

    <form action="{{ route('review.store', $game) }}" method="POST">
        @csrf
        <div>
            <label for="review">Review</label>
            <textarea type="text" id="review" name="review">{{ old('review') }}</textarea>
            @error('review')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="rating">Rating</label>
            <div class="rate">
                <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                <label for="star5" title="text">5 stars</label>
                <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" class="rate" name="rating" value="2">
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                <label for="star1" title="text">1 star</label>
            </div>
            @error('rating')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="p-2 mt-3 bg-green-600 text-white rounded">Save</button>
    </form>

    @auth
        <div>
            <a href="{{ route('games.edit', $game) }}" class="p-2 mt-3 bg-gray-600 text-white rounded">Edit game</a>
        </div>

        <div>
            <form action="{{ route('games.destroy', $game) }}" method="post">
                @method('DELETE')
                <button type="submit" class="p-2 mt-3 bg-red-600 text-white rounded">Delete game</button>
            </form>
        </div>
    @endauth
</x-layout>
