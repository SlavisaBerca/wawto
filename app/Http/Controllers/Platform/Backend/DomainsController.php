<?php

namespace App\Http\Controllers\Platform\Backend;

use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Platform\Domain;
use Illuminate\Validation\Rule;
use App\Models\Platform\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Platform\Subcategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class DomainsController extends Controller
{
    public function show()
    {   
        $categories = Category::all();

        $domains = Domain::all();

        $subcategories = Subcategory::all();

        return view('platform/backend/components/domain',compact('domains','subcategories','categories'));
    }
	public function settings($id)
	{
		$categories = Category::all();

        $domains = Domain::where('subcategory_id',$id)->orderBy('position','asc')->get();

        $subcategories = Subcategory::all();

        return view('platform/backend/components/sort_domains',compact('domains','subcategories','categories'));
	}
    public function add(Request $request)
    {
        $rules = $this->validate($request,[

            'domain_title'=>'required|string|max:255|unique:domains',

            'subcategory_id' => 'required',

            'domain_picture'=>'mimes:jpg,jpeg,png,bmp,tiff |max:4096',
        ]);


        $domain = new Domain;

        $subcategory = Subcategory::where('id',$request->subcategory_id)->first();

        $domain->domain_title = $request->domain_title;

        $domain->subcategory_id = $request->subcategory_id;

        $domain->generalsetting_id = 1;

        $domain->category_id = $subcategory->category->id;

        $domain->position = $request->position;

        $domain->fast_request = $request->fast_request;

        $domain->domain_url = Str::random(80);

        if($request->hasfile('domain_picture'))
        {
            $dirpath='platform/frontend/assets/images/domains/';

            $image = Input::file('domain_picture')->getClientOriginalName();

            $path = 'platform/frontend/assets/images/domains/'. $image;

            File::makeDirectory($dirpath, $mode = 0777, true, true);

            $img=Image::make(Input::file('domain_picture'))->resize($request->width, $request->height)->save($path);

        }else{
            $image='';
        }

        $domain->domain_picture = $image;

        $domain->save();

        return back()->with('success','Domeniu a fost adaugat...');
    }

    public function edit(Request $request, $id)
    {
        $domain = Domain::findOrFail($id); 

        $rules = $this->validate($request,[

            'domain_title'=>
            [
            'required',
            Rule::unique('domains')->ignore($domain->id),
             ],

            'subcategory_id' => 'required',

            'domain_picture'=>'mimes:jpg,jpeg,png,bmp,tiff |max:4096',
        ]);


      

        $subcategory = Subcategory::where('id',$request->subcategory_id)->first();

        $domain->domain_title = $request->domain_title;

        $domain->subcategory_id = $request->subcategory_id;

        $domain->generalsetting_id = 1;

        $domain->category_id = $subcategory->category->id;

        $domain->position = $request->position;

        $domain->fast_request = $request->fast_request;

        $domain->domain_url = $domain->domain_url;

        if($request->hasfile('domain_picture'))
        {
            $path='platform/frontend/assets/images/domains/'.$domain->domain_picture;
            
            if(File::exists($path))
            {
                File::delete($path);
            }

            $dirpath='platform/frontend/assets/images/domains/';

            $image = Input::file('domain_picture')->getClientOriginalName();

            $path = 'platform/frontend/assets/images/domains/'. $image;

            File::makeDirectory($dirpath, $mode = 0777, true, true);

            $img=Image::make(Input::file('domain_picture'))->resize($request->width, $request->height)->save($path);

        }else{
            $image = $domain->domain_picture;
        }

        $domain->domain_picture = $image;

        $domain->save();

        return back()->with('success','Domeniu a fost adaugat...');
    }

    public function destroy($id)
    {
        $get_domain = Domain::findOrFail($id);

        if($get_domain->requestform || $get_domain->offerform)
        {
            return back()->with('error','Acet domeniu contine elemente care depind de egzistenta lui...');
        }
        else
        {
            
            $path = 'platform/frontend/assets/images/'.$get_domain->domain_picture;
            
            if(File::exists($path))
            {
                File::delete($path);
            }
            $domain = Domain::findOrFail($id)->delete();

            return back()->with('success','Domeniul a fost eliminat impreuna cu poza..');
        }
        

    }

    public function sort(Request $request)
    {
        $cats=DB::table('domains')->get();
	
        foreach($cats as $cat){
            foreach($request->order as $order){
       
         $update=DB::table('domains')->where('id',$order['id'])->update(['position'=>$order['position']]);
     
         
            }
        }

         return back();
    }
}
