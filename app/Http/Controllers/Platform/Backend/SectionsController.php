<?php

namespace App\Http\Controllers\Platform\Backend;

use Image;
use Illuminate\Http\Request;
use App\Models\Platform\Page;
use App\Models\Generalsetting;
use App\Models\Platform\Section;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class SectionsController extends Controller
{
    public function show($id)
    {
        $sections = Section::where('page_id',$id)->orderBy('position','asc')->get();

        return view('platform/backend/components/visuals/sections',compact('sections'));
    }
    public function addSection(Request $request){

        $rules = $this->validate($request,[
            'folder'=>'required',

        ]);

        $gs=Generalsetting::findOrFail(1);
        
        $user=auth()->user();
        
            $page=Page::where('id',$request->page_id)->first();

            $title=$page->menu->menu_title;

            $section = new Section;

            $admin_type=$request->admin_type;

            $text=$request->text;

            $code=mt_rand();

		      	$folder=$request->folder;
           
            if($admin_type=='1'){

                if($request->hasfile('image')){

                    $dirpath = 'platform/frontend/assets/images/sections/'.$folder;

                    $image=Input::file('image')->getClientOriginalName();

        
                     $path = 'platform/frontend/assets/images/sections/'.$folder.'/'. $image;

                     File::makeDirectory($dirpath, $mode = 0777, true, true);

                     $img=Image::make(Input::file('image'))->resize(1920, 500)->save($path);
                
                }

                $html='
                <div class="row ml-5 mr-5">
					<div class="col-lg-12">
						<article class="post single">
							<div class="post-media">
								<img src="../'.$path.'" alt="Post">
							</div><!-- End .post-media -->

							<div class="post-body">
							'.$text.'

								
								</div><!-- End .post-content -->

							</div><!-- End .post-body -->
						</article><!-- End .post -->

						<hr class="mt-2 mb-1">';
               
               
            }
            if($admin_type=='2'){

                $text1=$request->text1;
            
                if($request->hasfile('image')){

                    $dirpath = 'platform/frontend/assets/images/sections/'.$folder;

                    $image=Input::file('image')->getClientOriginalName();
        
                    
                    $image=Input::file('image')->getClientOriginalName();
        
					$path = 'platform/frontend/assets/images/sections/'.$folder.'/'. $image;

                     File::makeDirectory($dirpath, $mode = 0777, true, true);

                     $img=Image::make(Input::file('image'))->resize(300, 300)->save($path);
                
                }
                if($request->hasfile('image1')){

						$dirpath = 'platform/frontend/assets/images/sections/'.$folder;

						$image1=Input::file('image1')->getClientOriginalName();
        
                    
						$image1=Input::file('image1')->getClientOriginalName();
        
						$path1 = 'platform/frontend/assets/images/sections/'.$folder.'/'. $image1;

						File::makeDirectory($dirpath, $mode = 0777, true, true);

						$img=Image::make(Input::file('image1'))->resize(300, 300)->save($path1);
                
                }

                $html='
               
                <div class="row ml-5 mr-5">
                <div class="card col-md-6">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="../'.$path.'" alt="Post"  height="280" style="width:100%;">
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                '.$text.'
                
                </div>
              </div>

              <div class="card col-md-6">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../'.$path1.'" alt="Post"  height="280" width:100%;">
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
              '.$text1.'
                
              </div>
            </div>
               
                      
               </div>
           ';
            }

            if($admin_type=='3'){
                
                $text1=$request->text1;
                $text2=$request->text2;
                if($request->hasfile('image')){
                     $dirpath = 'platform/frontend/assets/images/sections/'.$folder;
						$image=Input::file('image')->getClientOriginalName();
        
                    
						$image=Input::file('image')->getClientOriginalName();
        
						$path = 'platform/frontend/assets/images/sections/'.$folder.'/'. $image;
                     File::makeDirectory($dirpath, $mode = 0777, true, true);
                     $img=Image::make(Input::file('image'))->resize(300, 300)->save($path);
                
                }

                if($request->hasfile('image1')){
                      $dirpath = 'platform/frontend/assets/images/sections/'.$folder;
						$image1=Input::file('image1')->getClientOriginalName();
        
                    
                     $image1=Input::file('image1')->getClientOriginalName();
        
					 $path1 = 'platform/frontend/assets/images/sections/'.$folder.'/'. $image1;
                     File::makeDirectory($dirpath, $mode = 0777, true, true);
                     $img=Image::make(Input::file('image1'))->resize(300, 300)->save($path1);
                
                }

                if($request->hasfile('image2')){
                      $dirpath = 'platform/frontend/assets/images/sections/'.$folder;
						$image2=Input::file('image2')->getClientOriginalName();
        
                    
						$image2=Input::file('image2')->getClientOriginalName();
        
						$path2 = 'platform/frontend/assets/images/sections/'.$folder.'/'. $image2;
                     File::makeDirectory($dirpath, $mode = 0777, true, true);
                     $img=Image::make(Input::file('image2'))->resize(300, 300)->save($path2);
                
                }

                $html='
               
                <div class="row ml-5 mr-5">
                <div class="card col-md-4">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="../'.$path.'" alt="Post"  height="280" style="width:100%;">
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                '.$text.'
                
                </div>
              </div>
              <div class="card col-md-4">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../'.$path1.'" alt="Post"  height="280" style="width:100%;">
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
              '.$text1.'
              
              </div>
            </div>
              <div class="card col-md-4">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../'.$path2.'" alt="Post"  height="280" width:100%;">
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
              '.$text2.'
                
              </div>
            </div>
               
                      
               </div>
           ';
            }
           
             $section->page_id=$page->id;

             $section->admin_type=$admin_type;

            $section->html=$html;

            $section->folder=$request->folder;

            $section->generalsetting_id = 1;

            $section->is_visible=$request->is_visible;

			$section->page_type=$request->page_type;

            $section->save();

            return back()->with('success','Sectiune a fost adaugata...');
        
    }

   
    public function sectionsSort(Request $request){
    
      $sections=DB::table('sections')->get();
  
      foreach($sections as $section)
      {
  
          foreach($request->order as $order)
          {
     
               $update=DB::table('sections')->where('section_id',$order['id'])->update(['position'=>$order['position']]);
   
      
          }
      }
  
       return back()->with('success','Pozitie schimbata...refresh pentru vizualizare modificarilor!!!');
   }

       public function destroy($section_id)
      {
        $section = Section::where('section_id',$section_id)->first();

        $path = 'platform/frontend/assets/images/sections/'.$section->folder;

        if(File::exists($path))
        {
            File::deleteDirectory($path);
        }

        $delete = Section::where('section_id',$section_id)->delete();

        return back()->with('success','Sectiune a fost eliminata...');
      } 
}
