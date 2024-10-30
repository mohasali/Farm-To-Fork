<?php

namespace App\Http\Controllers;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function index(Request $request){
        $type = $request->input('type');
        $query = Box::query();
        if ($type) {
            $query->where('type', '=', $type);
        }
    
        $boxes = $query->paginate(12);

        return view('boxes.index',['boxes' =>$boxes,'type'=>$type,'types'=>Box::getEnumTypes()]);
    }

    public function show(Box $box) {
        
        return view('boxes.show',['box'=>$box]);
    }
}
