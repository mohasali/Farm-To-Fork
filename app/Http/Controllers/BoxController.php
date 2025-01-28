<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Tag;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index(Request $request)
    {
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
    
        return view('boxes.index', [
            'boxes' => $boxes,
            'type' => $type,
            'types' => Box::getEnumTypes(),
            'tags' => $tags
        ]);
    }
    

    public function show(Box $box) {
        $tags = $box->tags()->get();
        return view('boxes.show',['box'=>$box,'tags'=>$tags]);
    }

    public function review(Box $box) {
        $tags = $box->tags()->get();
        return view('boxes.review', ['box' => $box, 'tags'=>$tags]);
    }
    
}
