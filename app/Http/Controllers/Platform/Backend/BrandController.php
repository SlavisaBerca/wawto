<?php

namespace App\Http\Controllers\Platform\Backend;

use Image;
use Illuminate\Http\Request;
use App\Models\Generalsetting;

use App\Models\Platform\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function show(){
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();
    
        if($user->role){
            return view('platform/backend/pages/brands',compact('gs','user'));
        }else{
            return Redirect::to('home');
        }
        
    }
    public function deleteAll(){
        $brands=Brand::all();
        foreach($brands as $check){
            $path='platform/frontend/assets/images/brands/'.$check->brand_image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $delete=Brand::truncate();
        return back();
    }
    public function store(Request $request){
        $brand = new Brand;
        if($request->hasfile('image')){
            $dirpath = 'platform/frontend/assets/images/brands/';
            $image=Input::file('image')->getClientOriginalName();

             $path = 'platform/frontend/assets/images/brands/'. $image;
             File::makeDirectory($dirpath, $mode = 0777, true, true);
             $img=Image::make(Input::file('image'))->resize(300, 300)->save($path);
        
         
                }else{
                $image='';
          }
        $brand->brand_title=$request->title;
        $brand->domain_id=$request->domain_id;
        $brand->generalsetting_id=1;
        $brand->brand_image=$image;
        $brand->save();
        return back();
    }
    public function update(Request $request, $id){
        $brn=Brand::where('id',$id)->first();
        if($request->hasfile('image')){ 
            $path='platform/frontend/assets/images/brands/'.$brn->brand_image; 
            if(File::exists($path)){
            File::delete($path);
        }
            $dirpath = 'platform/frontend/assets/images/brands/';
            $image=Input::file('image')->getClientOriginalName();

             $path = 'platform/frontend/assets/images/brands/'. $image;
             File::makeDirectory($dirpath, $mode = 0777, true, true);
             $img=Image::make(Input::file('image'))->resize(300, 300)->save($path);
        
         
                }else{
                $image=$brn->brand_image;
          }
       
       
        $brand=Brand::where('id',$id)->update([
            'brand_title'=>$request->title,
            'brand_image'=>$image,
            'domain_id'=>$request->domain_id,

        ]);
        return back();
    }
    public function delete($id){
        $brand=Brand::where('id',$id)->first();
        $path='frontend/assets/images/brands/'.$brand->brand_image;
        if(File::exists($path)){
            File::delete($path);
        }
        $del=Brand::where('id',$id)->delete();
        return back();
    }
}
