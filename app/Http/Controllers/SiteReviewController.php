<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteReview;
use Auth;

class SiteReviewController extends Controller
{
    public function siteReviews(){
        $siteReviews = SiteReview::all();
        return view('home', compact('siteReviews'));
    }

    public function show($id) {
        return view('review',['review'=>SiteReview::findOrFail($id)]);
    }

    public function store(){
        SiteReview::create([
            'site_rating' => request()->rating,
            'site_title' => request()->title,
            'site_description' => request()->description,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect('/');
    }
}
