<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Platform\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Platform\Subcategory;

class SubcategoriesController extends Controller
{
    public function show()
    {
        $categories = Category::all();

        return view('platform/backend/components/subcategory',compact('categories'));
    }
	
	public function srtCat($id)
	{
		$category = Category::findOrFail($id);
		
		return view('platform/backend/components/sort_subcategories',compact('category'));
	}

    public function add(Request $request)
    {
        $rules = $this->validate($request,[
            'subcat_title'=>'required|string|max:255|unique:subcategories',
            'category_id' => 'required',
            
        ]);
        $position = Subcategory::count()+1;

        $subcategory = new Subcategory;

        $subcategory->generalsetting_id = 1;

        $subcategory->subcat_title = $request->subcat_title;

        $subcategory->category_id = $request->category_id;

        $subcategory->position = $position;

        $subcategory->save();

        return back()->with('success','Subcategorie a fost adaugata...');

    }

    public function sort(Request $request)
    {
        $cats=DB::table('subcategories')->get();
        foreach($cats as $cat){
            foreach($request->order as $order){
       
         $update=DB::table('subcategories')->where('id',$order['id'])->update(['position'=>$order['position']]);
     
         
            }
        }

         return back();
    }

    public function edit(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $rules = $this->validate($request, [
            'subcat_title' => [
                'required',
                Rule::unique('subcategories')->ignore($subcategory->id),
                ],
                'category_id'=>'required',
        ]);

        $update = Subcategory::findOrFail($id)->update([
            'subcat_title' => $request->subcat_title,
            'category_id' => $request->category_id,
            'position' => $request->position,
        ]);

        return back()->with('success','Subcategorie a fost editata...');
    }

    public function destroy($id) 
    {
        $subcategory = Subcategory::findOrFail($id);

        if($subcategory->domain->count())
        {
            return back()->with('error','Subcategorie contine elemente care depind de egzistenta ei...');
        }
        else 
        {
            $subcat = Subcategory::findOrFail($id)->delete();

            return back()->with('success','Subcategorie a fost eliminata...');
        }
    }
}
