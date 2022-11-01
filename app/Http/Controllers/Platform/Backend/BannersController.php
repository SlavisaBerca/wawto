<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Models\Platform\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class BannersController extends Controller
{
    public function show()
    {
        $banners = Banner::all();

        return view('platform/backend/components/visuals/banners',compact('banners'));
    }

    public function add(Request $request)
    {
        $banner = new Banner;

       
        
        if($request->hasfile('image'))
        {
        if($request->folder)
        {
            $folder = $request->folder;
        }
        else
        {
            $folder = 'default';
        }

        $dirpath='platform/frontend/assets/images/banners/'.$folder;

        $image = Input::file('image')->getClientOriginalName();

        $path = 'platform/frontend/assets/images/banners/'.$folder.'/'. $image;

        File::makeDirectory($dirpath, $mode = 0777, true, true);

        $img=Image::make(Input::file('image'))->resize($request->width, $request->height)->save($path);

        }else
        {

        $image='';

        }
        $path = 'platform/frontend/assets/images/banners/'.$folder.'/'. $image;
       

        if($request->type=='mini')
        {

        $html = '
        <div class="banner banner2 pl-sm-3 pl-0 pl-xl-0 mb-1">
             <img class="slide-bg" src="../'.$path.'" alt="slider image" style="background-color: #b48476;">
             <div class="container d-flex align-items-center">
                     <div class="banner-layer d-flex flex-column">
                     '.$request->html.'
                    </div>
                 <!-- End .banner-layer -->
             </div>
        </div>
        <!-- End .home-slide -->
        ';
        }
        else
        {
            $html ='
            <div class="banner-section banner-bg" style="background-image: url(../'.$path.');">
            <div class="banner col-md-11 m-auto d-flex align-items-center flex-column flex-sm-row justify-content-center justify-content-sm-between">
                <div class="content-left text-center text-sm-right">
                   '.$request->html.'
                </div>
                
            </div>
        </div>
            ';
        }
        
      

        if($request->page_id)
        {
            $banner->page_id = $request->page_id;

            $banner->generalsetting_id = 0;
        }
        else 
        {
            $banner->page_id = 0;

            $banner->generalsetting_id = 1;
        }

        $banner->page_type = $request->page_type;

        $banner->type = $request->type;

        $banner->html = $html;

        $banner->is_visible = $request->is_visible;

        $banner->folder = $folder;

        $banner->save();

        return back()->with('success','Bannerul a fost adaugat...');
      
        
    }

    public function destroy($banner_id)    
    {
        $get = Banner::where('banner_id',$banner_id)->first();

        $path = 'platform/frontend/assets/images/banners/'.$get->folder.'/'.$get->image;

        if($get->folder=='default')
        {
            File::delete($path);
        }
        else
        {
            $dirpath = 'platform/frontend/assets/images/banners/'.$get->folder;

            File::deleteDirectory($dirpath);
        }

        $delete = Banner::where('banner_id',$banner_id)->delete();

        return back()->with('success','Bannerul a fost sters...');
    }
}
