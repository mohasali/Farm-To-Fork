<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteReview;

class SiteReviewController extends Controller
{
    public function siteReviews(){
        $site_reviews = SiteReview::all();
        return view('site_reviews.site_reviews', compact('site_reviews'));
    }

    public function show($id) {
        return view('site_review',['site_review'=>SiteReview::findOrFail($id)]);
    }
}
