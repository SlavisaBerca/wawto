<?php

namespace App\Http\Controllers\Platform\Backend;

use DB;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Models\Platform\Domain;
use App\Models\Platform\Category;
use App\Http\Controllers\Controller;
use App\Models\Platform\Requestform;
use App\Models\Platform\Subcategory;
use App\Models\Platform\Requestformcomponent;

class FormsViewController extends Controller
{
    public function show()
    {   
        $categories = Category::all();

        $domains = Domain::all();

        $subcategories = Subcategory::all();

        return view('platform/backend/components/forms_list',compact('domains','subcategories','categories'));
    }

    public function index($id){

        $domain=Domain::findOrFail($id);
    
        $form=$domain->requestform;
    
        if(!$form)
        {
            $form = new Requestform;
            $form->domain_id=$id;
            $form->has_part=0;
            $form->has_equipment=0;
            $form->save();
			return back()->with('success','Formular a fost creat apasati setari pentru adaugarea componentelor');
        }
    
        $gs=Generalsetting::findOrFail(1);
    
        $user=auth()->user();
    
    
      
      return view('platform/backend/settings/request_form',compact('gs','user','form'));
    
          
        
    
    
       }
    
       public function destroyComponents(){
           $delete=Requestformcomponent::truncate();
           return back();
       }
    
       public function destroyComponent($component_id)
       {
           $delete=Requestformcomponent::where('component_id',$component_id)->delete();
           return back();
       }
    
       public function addComponent(Request $request)
       {
    
           $form=Requestform::where('id',$request->form_id)->first();
       
           $position=Requestformcomponent::count() +1;
    
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
			
			$max_l=$request->ml;
			
			if($max_l)
			{
				$id = 'length_input';
				$attr ='maxlength="'.$request->length.'"';
		
				$info_label='<label id="info_label></label>"';
			}
			else 
			{
				$id='';
				$attr='';
				$info_label='';
				
			}
			if($type=='separator')
			{
				$html='<div class="col-md-12 mt-2"></div>';
			}
            if($type !=='file')
            {
				
                $html='<div class="col-md-'.$col.'">
                <label>'.$label.''.$star.'</label>
                <input type="'.$type.'" class="form-control" '.$attr.' id="'.$id.'" name="input[]" style="border:none;border-bottom:solid 1px black;"'.$settings.''.$required.'>
                <input type="hidden" name="label[]" value="'.$label.'">
				
                </div>';
            }
            if($type=='checkbox')
            {
				$di = mt_rand();
                $html='<div class="col-md-4"><label><input type="checkbox" class="mt-1" name="input_check[]" id="check_box" data-id="'.$di.'" value="'.$value.'">'.$label.'</label>
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
            
            $component = new Requestformcomponent;
    
            $component->form_id=$request->form_id;
    
            $component->html=$html;
    
            $component->position=$position;
    
            $component->save();
    
            return back();
       }
       public function setForm(Request $request)
       {
    
           $form=Requestform::where('id',$request->form_id)->first();
    
           if(!$request->no_part)
           {
    
               if($request->has_part)
               {
    
                   $has_part=$request->has_part;
    
               }
               else
               {
    
                   $has_part=$form->has_part;
               }
               
           }
           else
           {
               $has_part=0;
           }
           
           $update=Requestform::where('id',$form->id)->update(['has_part'=>$has_part,'has_equipment'=>$request->has_equipment]);
    
           return back()->with('success','Formular a fost setat...');
       }
    
       public function componentSort(Request $request){
    
        $components=DB::table('requestformcomponents')->get();
    
        foreach($components as $component)
        {
    
            foreach($request->order as $order)
            {
       
                 $update=DB::table('requestformcomponents')->where('component_id',$order['id'])->update(['position'=>$order['position']]);
     
        
            }
        }
    
         return back();
     }
}
