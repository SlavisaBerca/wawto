<?php

namespace App\Http\Controllers\Platform\Backend;

use Image;
use Illuminate\Http\Request;
use App\Models\Platform\Slide;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class SliderController extends Controller
{
    public function show()
    {
        $slides = Slide::all();

        return view('platform/backend/components/visuals/sliders',compact('slides'));
    }

    public function add(Request $request)
    {
		
		$rules = $this->validate($request,[
			'image'=>'required|mimes:jpg,jpeg,png,gif,svg',
		]);
        $count = Slide::count();

        $slide = new Slide;

        $slide->html = $request->html;

        $slide->link = $request->link;
       
        $slide->page_type = $request->page_type;
		
        if($request->page_id)
        {
            $slide->page_id = $request->page_id;
            $slide->generalsetting_id = 0;
        }
        else 
        {
            $slide->page_id = 0;

            $slide->generalsetting_id = 1;
        }

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

            $dirpath='platform/frontend/assets/images/slider/'.$folder;

            $image = Input::file('image')->getClientOriginalName();

            $path = 'platform/frontend/assets/images/slider/'.$folder.'/'. $image;

            File::makeDirectory($dirpath, $mode = 0777, true, true);

            $img=Image::make(Input::file('image'))->resize($request->width, $request->height)->save($path);

            }else
            {

            $image='';
            }
            
        $slide->image = $image;

        $slide->link = $request->link;

        $slide->is_visible = $request->is_visible;

        $slide->folder = $request->folder;

        $slide->save();

        return back()->with('success','Slide a fost salvat...');
        
    }


    public function edit(Request $request, $slide_id)
    {
        $slide = Slide::where('slide_id',$slide_id)->first();

        if($request->folder)
        {
            $folder = $request->folder;
        }
        else
        {
            $folder = 'default';
        }
        if($request->hasfile('image'))
        {
            $path = 'platform/frontend/assets/images/slider/'.$folder.'/'. $slide->image;

            if(File::exists($path))
             {
                 File::delete($path);
             }

        $dirpath='platform/frontend/assets/images/slider/'.$folder;

        $image = Input::file('image')->getClientOriginalName();

        $path = 'platform/frontend/assets/images/slider/'.$folder.'/'. $image;

        File::makeDirectory($dirpath, $mode = 0777, true, true);

        $img=Image::make(Input::file('image'))->resize($request->width, $request->height)->save($path);

        }
        else
        {

        $image = $slide->image;

        }

        if($request->page_id)
        {
            $page_id = $request->page_id;
            $generalsetting_id = 0;
        }
        else
        {
            $page_id = 0;
            $generalsetting_id = 1;
        }

        $page_type = $request->page_type;

       

        $link = $request->link;

        $html = $request->html;

        $update = Slide::where('slide_id',$slide_id)->update([
            'image'=>$image,
            'html'=>$html,
            'link'=>$link,
            'page_id'=>$page_id,
            'page_type'=>$page_type,
            'generalsetting_id'=>$generalsetting_id,
        ]);
        
        return back()->with('success','Slide a fost editat cu success...');
    }

    public function destroy($slide_id)
    {
        $slide = Slide::where('slide_id',$slide_id)->first();

        $path = 'platform/frontend/assets/images/slider/'.$slide->folder;

        if(File::exists($path))
        {
            if($slide->folder=='default')
            {
                $imgpath = 'platform/frontend/assets/images/slider/'.$slide->folder.'/'.$slide->image;

                File::delete($imgpath);
            }
            else
            {
                File::deleteDirectory($path);
            }
        }

        $delete = Slide::where('slide_id',$slide->slide_id)->delete();

        return back()->with('success','Slide a fost eliminat...');
    }
}
