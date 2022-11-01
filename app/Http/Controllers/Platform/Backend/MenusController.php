<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Models\Platform\Menu;
use App\Models\Platform\Page;
use App\Http\Controllers\Controller;

class MenusController extends Controller
{
        public function show()
        {
            $menus = Menu::where('is_header',1)->get();
			
			
			

            return view('platform/backend/navigation/front_menus',compact('menus'));
        }

       
        public function add(Request $request)
        {

            $user=auth()->user();

           
            

            $menu = new Menu;
           
            $menu->menu_title=$request->menu_title;

            $menu->is_header=$request->is_header;

            $menu->is_footer=$request->is_footer;

            $menu->is_visible=$request->is_visible;

            $menu->generalsetting_id=1;

            $menu->menu_url=$request->url;

            $menu->show_rules=$request->show_rules;

            $menu->save();

            return back()->with('success','Meniu a fost adaugat');
            
            
        }
		
		public function createPage($id)
		{
			$menu = Menu::findOrFail($id);
			
			$page = $menu->page;
			
			if(!$page)
			{
				$page = new Page;
				$page->menu_id=$id;
				$page->has_slider=0;
				$page->has_banner=0;
				$page->save();
				
			}
			
			return back()->with('success','Pagina pentru meniu a fost creata cu success');
		}
        public function edit(Request $request, $id)
        {

            $user=auth()->user();
           
            $menu=Menu::findOrFail($id);

            if(!$request->is_visible)
            {
                $is_visible=$menu->is_visible;
            }
            else
            {
                $is_visible=$request->is_visible;
            }
            if($request->change_header)
            {
                $is_header=0;
            }
            else
            {
                if($request->is_header)
                {
                    $is_header=$request->is_header;
                }
                else
                {
                       $is_header=$menu->is_header;
                }
             
            }
            if($request->change_footer)
            {
             $is_footer=0;
            }
            else
            {
                if($request->is_footer){
                    $is_footer=$request->is_footer;
                }
                else
                {

                    $is_footer=$menu->is_footer;
                }
           
            }
            $upd=Menu::where('id',$id)->update
            (
                [
                    'menu_title'=>$request->menu_title,
                    'is_header'=>$is_header,
                    'is_footer'=>$is_footer,
                    'is_visible'=>$is_visible,
                    'menu_url'=>$request->url,
                ]
            ); 

            return back()->with('success','Meniu a fost editat');
         
        }
        public function deleteMenu($id){
     
        }
        public function deleteAllMenus()
        {

            $user=auth()->user();
           
            $menus=Menu::all();

            $pages=Page::all();

            $sections=Section::all();

            $path='frontend/assets/images/dy';

            $path1='frontend/assets/images/slides/dy';

             File::deleteDirectory($path);

             File::deleteDirectory($path);
                 
             $del=Section::truncate();

             $del_pg=Page::truncate();

             $delm=Menu::truncate();

             return back()->with('success','Meniuri au fost sterse');
            
         }
}
