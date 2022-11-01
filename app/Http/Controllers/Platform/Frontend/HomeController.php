<?php

namespace App\Http\Controllers\Platform\Frontend;

use Illuminate\Http\Request;
use App\Models\Platform\Menu;
use App\Models\Platform\Section;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('platform.frontend.pages.home_page');
    }

    public function contact(){
        return view('platform.frontend.pages.contact');
    }

    public function search()
    {
        $search = $_GET['search'];
        
        $result = Section::where('html','LIKE','%'.$search.'%')->get();

        return view('platform/frontend/pages/content_search',compact('result'));
    }

    public function dinamycPage($menu_url)
    {
        $start = Menu::where('menu_url',$menu_url)->first();

        $page = $start->page;

        return view('platform/frontend/pages/dinamyc_page',compact('page'));
    }

    public function viewCityName(Request $request)
    {
		$data=DB::table('cities')->where('region_id',$request->region_id)->get();

		return response()->json($data);

	}
}
