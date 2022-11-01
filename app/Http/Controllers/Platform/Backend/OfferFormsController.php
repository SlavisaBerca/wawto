<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Models\Platform\Domain;
use App\Models\Platform\Category;
use App\Models\Platform\Offerform;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Platform\Subcategory;
use App\Models\Platform\Offerformcomponent;

class OfferFormsController extends Controller
{
    public function show()
    {   
        $categories = Category::all();

        $domains = Domain::all();

        $subcategories = Subcategory::all();
        
        return view('platform/backend/components/offer_forms_list',compact('domains','subcategories','categories')); 
    }

    public function index($id){

        $domain=Domain::findOrFail($id);
    
        $form=$domain->requestform;
    
        if(!$form->has_part)
        {
            $offerform = $domain->offerform;
            if(!$offerform){
            $offerform = new Offerform;
            $offerform->domain_id=$id;
            $offerform->save();
			return back()->with('success','Formular a fost creat Apasati setari pentru adaugare componentelor');
            }
        }
        $offerform = $domain->offerform;
        $gs=Generalsetting::findOrFail(1);
    
        $user=auth()->user();
    
    
      
         return view('platform/backend/settings/offer_form',compact('gs','user','offerform','form'));
    
       }

       public function destroyComponents(){
        $delete=Offerformcomponent::truncate();
        return back();
    }
 
    public function destroyComponent($component_id)
    {
        $delete=Offerformcomponent::where('oc_id',$component_id)->delete();
        return back();
    }
 
    public function addComponent(Request $request)
    {
 
        $form=Offerform::where('of_id',$request->form_id)->first();
    
        $position=Offerformcomponent::count() +1;
 
         $type=$request->type;
 
         $col=$request->col;
 
         $required=$request->required;
         
         $label=$request->label;
 
         if($required)
         {
             $star='*';
         }else{
             $star='';
         }
 
         if(!$request->value && $type=='checkbox')
         {
             $value=1;
         }
         else
         {
             $value=$request->value;
         }
 
         $settings=$request->settings;
 
         if($type !=='file')
         {
             $html='<div class="col-md-'.$col.'">
             <label>'.$label.''.$star.'</label>
             <input type="'.$type.'" class="form-control" name="input[]" style="border:none;border-bottom:solid 1px black;"'.$settings.''.$required.'>
             <input type="hidden" name="label[]" value="'.$label.'">
             </div>';
         }
         if($type=='checkbox')
         {
             $html='<div class="col-md-4"><label><input type="checkbox" class="mt-1" name="input_check[]" data-id="'.$di.'" value="'.$value.'">'.$label.'</label>
                 <input type="hidden" name="check_label[]" id="lab'.$di.'" value="'.$label.'">
             </div>';
         }
         if($type=='select')
         {
             $options=$request->options;
         
             $html='<div class="col-md-'.$col.'">
             <label>'.$label.''.$star.'</label>
             <select class="form-control" name="input[]"style="height:46px; border:none;border-bottom:solid 1px black;"'.$required.'>
             '.$options.'
             </select>
             <input type="hidden" name="label[]" value='.$label.'">
             </div>';
         }
         if($type=='text_area')
         {
             $html='
             <div class="col-md-12">
             <label>'.$label.''.$star.'</label>
             <textarea class="form-control" name="input[]"placeholder="Mentiuni" cols="8" rows="8"></textarea>
             <input type="hidden" name="label[]" value='.$label.'">
             </div>
             ';
         }
         if($type=='file')
         {
             $html='<div class="col-md-'.$col.'">
             <label>'.$label.''.$star.'</label>
             <input type="'.$type.'" class="form-control" name="image[]" style="border:none;border-bottom:solid 1px black;"'.$required.'>
             <input type="hidden" name="image_label[]" value="'.$label.'">
             </div>';
         }
         
         $component = new Offerformcomponent;
 
         $component->of_id=$request->form_id;
 
         $component->html=$html;
 
         $component->position=$position;
 
         $component->save();
 
         return back();
    }

    public function offerComponentSort(Request $request){

        $components=DB::table('offerformcomponents')->get();
    
        foreach($components as $component)
        {
    
            foreach($request->order as $order)
            {
       
                 $update=DB::table('offerformcomponents')->where('oc_id',$order['id'])->update(['position'=>$order['position']]);
     
        
            }
        }
    
         return back();
     }
}
