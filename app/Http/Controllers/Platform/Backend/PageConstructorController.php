<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Models\Platform\Page;
use App\Http\Controllers\Controller;

class PageConstructorController extends Controller
{
    public function show($id){
       
        $page=Page::findOrFail($id);
    
            return view('platform/backend/components/visuals/page',compact('page'));
        
        
    }

    public function showPages()
    {
        $pages=Page::all();

        return view('platform/backend/components/visuals/pages',compact('pages'));
    }
}
