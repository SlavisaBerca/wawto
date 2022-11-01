<?php

namespace App\Http\Controllers\Platform\Backend;
use DB;
use Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Platform\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('platform/backend/components/category',compact('categories'));
    }

    public function sort(Request $request)
    {
        $cats=DB::table('categories')->get();
        foreach($cats as $cat){
            foreach($request->order as $order){
       
         $update=DB::table('categories')->where('id',$order['id'])->update(['position'=>$order['position']]);
     
         
            }
        }

         return back();
    }

    public function add(Request $request)
    {
        $category = new Category;

        $rules = $this->validate($request,[

            'cat_title'=>'required|string|max:255|unique:categories',

            'cat_image'=>'mimes:jpg,jpeg,png,bmp,tiff |max:4096',
        ]);


        if($request->hasfile('cat_image'))
        {
            $dirpath='platform/frontend/assets/images/categories/';

            $image = Input::file('cat_image')->getClientOriginalName();

            $path = 'platform/frontend/assets/images/categories/'. $image;

            File::makeDirectory($dirpath, $mode = 0777, true, true);

            $img=Image::make(Input::file('cat_image'))->resize($request->width, $request->height)->save($path);

        }else{
            $image='';
        }

        $category->cat_title = $request->cat_title;

        $category->cat_image=$image;

        $category->show_rules = $request->show_rules;
        
        $category->position = $request->position;

        $category->generalsetting_id = 1;
   
        $category->save();
        
        return back()->with('success','Categorie a fost salvata!!!');
    }

    public function edit(Request $request, $id)
    {
        $category_get=Category::findOrFail($id);

        $rules = $this->validate($request,[
           

            'cat_image'=>'mimes:jpg,jpeg,png,bmp,tiff |max:4096',

            'cat_title' => [
            'required',
            Rule::unique('categories')->ignore($category_get->id),
            ],
    ]);

            

        if($request->hasfile('cat_image'))        
        {
            $path = 'platform/frontend/assets/images/categories/'.$category_get->cat_mage;

            if(File::exists($path))
            {
                File::delete($path);
            }

            $dirpath = 'platform/frontend/assets/images/categories/';

            $image=Input::file('cat_image')->getClientOriginalName();

             $path = 'Platform/frontend/assets/images/categories/'. $image;

             File::makeDirectory($dirpath, $mode = 0777, true, true);

             $img=Image::make(Input::file('cat_image'))->resize($request->width, $request->height)->save($path);
        
         
                }
                else
                {
                     $image = $category_get->cat_image;
                }


            $category=Category::findOrFail($id)->update([
            'cat_title'=>$request->cat_title,
            'cat_image'=>$image,
            'position'=>$request->position,
            'show_rules'=>$request->show_rules,
            'position'=>$request->position,
        ]);

        return back()->with('success','Categorie a fost editata...');

    }

    public function destroy($id)
    {
        $get_cat = Category::findOrFail($id);
        
        if($get_cat->subcategory->count() || $get_cat->domain->count())
        {

            return back()->with('error','Categorie Nu poate fii stersa pentru ca domenii sau subactegorii depind de ea...');

        }else{

            $path='platform/frontend/assets/images/categories/'.$get_cat->cat_image;

            if(File::exists($path))
            {
                File::delete($path);
            }
            $category=Category::findOrFail($id)->delete();
            
            return back()->with('success','Categorie a fost stersa impreuna cu poza...');
        }
      
    }
}
