<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    public function reviews(){
        $reviews = Review::all();
        return view('reviews.reviews', compact('reviews'));
    }

    public function show($id) {
        return view('review',['review'=>Review::findOrFail($id)]);
    }

}
