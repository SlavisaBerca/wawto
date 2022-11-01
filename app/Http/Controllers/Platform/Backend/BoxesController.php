<?php

namespace App\Http\Controllers\Platform\Backend;

use App\Models\Platform\Box;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoxesController extends Controller
{
    public function mini()
    {
       
        $miniboxes = Box::all();

        return view('platform/backend/components/visuals/mini_boxes',compact('miniboxes'));
    }

    public function maxi()
    {
       
        $maxiboxes = Box::all();

        return view('platform/backend/components/visuals/maxi_boxes',compact('maxiboxes'));
    }

    public function addMaxi(Request $request)
    {

        $rules = $this->validate($request,[
            'icon'=>'required',
            'html'=>'required',
            
        ]);

        $box = new Box;

        $box ->icon = $request->icon;

        $html = '
        <div class="col-md-4">
        <div class="feature-box px-sm-5 feature-box-simple text-center">
            <div class="feature-box-icon">
                <i class="'.$request->icon.'"></i>
            </div>
            <div class="feature-box-content p-0">
               '.$request->html.'
            </div>
            <!-- End .feature-box-content -->
        </div>
        <!-- End .feature-box -->
    </div>
    <!-- End .col-md-4 -->
        ';



        $box->html = $html;
        $box->box_type='maxi';

        if(!$request->page_id)
        {
            $box->generalsetting_id = 1;
            $box->page_id = 0;

        }else
        {
            $box->generalsetting_id = 0;
            $box->page_id = $request->page_id;
        }

        $box->page_type = $request->page_type;

        $box->save();

        return back()->with('success','Boxa a fost adautata...');
    }

    public function editMaxi(Request $request, $box_id)
    {
        $maxi = Box::where('box_id',$box_id)->first();

      

       

        $page_id = $maxi->page_id;

        $page_type = $maxi->page_type;

       if($request->page_id)
       {
           $page_type = $maxi->page_type;
           $page_id = $request->page_id;

       }if($request->page_type)
       {
           $page_id = $maxi->page_id;
           $page_type = $request->page_type;
       }
        
       

       

        $update = Box::where('box_id',$box_id)->update([
           
            'icon'=>$request->icon,
            'page_id'=>$page_id,
            'page_type'=>$page_type,
        ]);

        return back()->with('scucess','Box a fost editat...');
    }

    public function editMini(Request $request, $box_id)
    {
        $maxi = Box::where('box_id',$box_id)->first();

      

      
        

       
      
            if($request->page_id)
             {
                $page_id = $reqeust->page_id;
                $page_type = $maxi->page_type;
             }
             else
            {
                $page_id = $maxi->page_id;
                $page_type = $request->page_type;
            }
       
     
        
       

       

        $update = Box::where('box_id',$box_id)->update([
           
            'icon'=>$request->icon,
            'page_id'=>$page_id,
            'page_type'=>$page_type,
        ]);

        return back()->with('scucess','Box a fost editat...');
    }

    public function addMini(Request $request)
    {

        $rules = $this->validate($request,[
            'icon'=>'required',
            'html'=>'required',
            
        ]);

        $box = new Box;

        $box ->icon = $request->icon;

        $html = '
        <div class="info-box info-box-icon-left" style="background:none;">
        <i class="'.$request->icon.' mr-3 pr-2"></i>

        <div class="info-box-content">
            '.$request->html.'
        </div>
        <!-- End .info-box-content -->
    </div>
    <!-- End .info-box -->
        ';



        $box->html = $html;

        if(!$request->page_id)
        {
            $box->generalsetting_id = 1;
            $box->page_id = 0;

        }else
        {
            $box->generalsetting_id = 0;
            $box->page_id = $request->page_id;
        }

        $box->page_type = $request->page_type;

        $box->save();

        return back()->with('success','Boxa a fost adautata...');
    }

    public function destroy($box_id)
    {
        $box = Box::where('box_id',$box_id)->delete();

        return back()->with('success','Boxa a fost eliminata....');
    }


}
