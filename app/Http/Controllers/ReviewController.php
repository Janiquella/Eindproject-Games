<?php

namespace App\Http\Controllers;

use App\Models\Game;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request, Game $game)
    {
        $review = Review::create([
            'user_id' => auth()->id(),
            'game_id' => $game->id,
            'review' => $request->review,
            'rating' => $request->rating
        ]);
        return redirect()->route('games.show', $game)->with('success', 'Review added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if ($review->user_id !== auth()->id()) {
            abort(403);
        }
        $review->delete();
        return redirect()->route('games.show', $review->game);
    }

    public function review(Request $request)
    {
//        $review = new Review();
//        $review->booking_id = $request->booking_id;
//        $review->comments = $request->comment;
//        $review->star_rating = $request->rating;
//        $review->user_id = Auth::user()->id;
//        $review->service_id = $request->service_id;
//        $review->save();
//        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully,');
    }
}
