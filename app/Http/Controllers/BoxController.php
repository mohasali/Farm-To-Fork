<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Review;
use App\Models\Tag;
use Auth;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index(Request $request, Box $box){
        $request->validate([
            'type' => 'string',
            'q' => 'string',
            'tags' => 'array'
        ]);
    
        $q = $request->input('q');
        $tags = $request->input('tags');
        $type = urldecode($request->input('type'));
    
        $query = Box::query();
    
        if ($type) {
            $query->where('type', '=', $type);
        }
    
        if ($tags) {
            $query->whereHas('tags', fn($tagQuery) => $tagQuery->whereIn('tags.id', $tags));
        }
    
        if ($q) {
            $query->where(fn($searchQuery) =>
                $searchQuery->where('title', 'LIKE', '%' . $q . '%')
            );
        }
    
        $boxes = $query->paginate(12);
        $tags = Tag::all();
        $images = $box->getImages();
    
        return view('boxes.index', [
            'boxes' => $boxes,
            'type' => $type,
            'types' => Box::getEnumTypes(),
            'tags' => $tags,
            'images' => $images
        ]);
    }
    
    public function show(Box $box) {
        $tags = $box->tags()->get();
        $reviews = $box->reviews()->with('user')->get();
        $images = $box->getImages(); // Get all images for the box
        
        return view('boxes.show', [
            'box' => $box,
            'tags' => $tags,
            'reviews' => $reviews,
            'images' => $images
        ]);
    }

    public function review(Box $box) {
        $tags = $box->tags()->get();
        return view('boxes.review', ['box' => $box, 'tags'=>$tags]);
    }
    
    public function addReview(Box $box, Request $request){
        $request->validate([
            'rating' => ['required', 'integer', 'min:0', 'max:5'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
        ]);

        Review::create([
            'rating'=> $request->rating,
            'title'=> $request->title,
            'description' => $request->description,
            'box_id'=> $box->id,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect()->back()->with(['success'=> 'Review added succesfully.']);
    }
}