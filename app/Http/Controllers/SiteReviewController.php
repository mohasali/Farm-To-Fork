<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteReview;

class SiteReviewController extends Controller
{
    public function siteReviews(){
        $siteReviews = SiteReview::all();
        return view('home', compact('siteReviews'));
    }

    public function show($id) {
        return view('review',['review'=>SiteReview::findOrFail($id)]);
    }
}
