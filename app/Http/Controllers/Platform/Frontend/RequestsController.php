<?php

namespace App\Http\Controllers\Platform\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Models\Platform\Domain;
use App\Models\Platform\Region;
use App\Models\Platform\Partparam;
use Illuminate\Support\Facades\DB;
use App\Models\Platform\Brandparam;
use App\Http\Controllers\Controller;
use App\Models\Platform\Requestmodel;
use Illuminate\Support\Facades\Redirect;


class RequestsController extends Controller
{
    public function showMain($domain_url){
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();
        $regions=Region::all();
        $domain=Domain::where('domain_url',$domain_url)->first();
        $form=$domain->requestform;
      
       return view('platform/frontend/forms/main_form',compact('gs','user','form','domain','regions'));	
	

      
    }

    public function showQuickForm($domain_url){
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();
        $regions=Region::all();
        $domain=Domain::where('domain_url',$domain_url)->first();
    
      
			return view('platform/frontend/forms/quick_form',compact('gs','user','domain','regions'));	
	

      
    }
    public function localRequests(Request $request){
		$pg=18;
		$sort='desk';
		if(isset($_GET['limit'])){
			$limit=$_GET['limit'];
			if($limit=='all'){
				$pg=10000;
			}else{
				$pg=$_GET['limit'];
			}
			
		}
		if(isset($_GET['sorting'])){
			$sort=$_GET['sorting'];
		}
		
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();
		$brandparam=Brandparam::where('user_id',$user->id)->where('brand_id','99999999999')->first();
		$partparam=Partparam::where('user_id',$user->id)->where('param','99999999999')->first();
		
		if($partparam && !$brandparam){
			$requests_count=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')
		->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
        ->where('brandparams.user_id',$user->id)		 
        ->where('locationparams.user_id',$user->id)
        ->where('domainparams.user_id',$user->id)->count();
		}
		//count requests
		if($brandparam && !$partparam){		
		$requests_count=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location') 
		->leftjoin('partparams','requests.part_type','=','partparams.param')
        ->where('locationparams.user_id',$user->id)   
		->where('partparams.user_id',$user->id)
		->where('requests.added_by','!=',$user->id)
		->where('requests.status','=','1')
        ->where('domainparams.user_id',$user->id)->count();
		}
		if($partparam && $brandparam){		
		$requests_count=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location') 
		->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
        ->where('locationparams.user_id',$user->id)        
        ->where('domainparams.user_id',$user->id)
		->where('requests.added_by','!=',$user->id)
		->where('brandparams.user_id',$user->id)
		->where('requests.status','=','1')->count();
		
		}
		if($brandparam && $partparam){
			$requests_count=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')       
        ->where('locationparams.user_id',$user->id) 
		->where('requests.added_by','!=',$user->id)
		->where('requests.status','=','1')	
        ->where('domainparams.user_id',$user->id)->count();
		
		}if(!$partparam && !$brandparam){
		
	
		$requests_count=DB::table('requests')
		
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location') 
		->leftjoin('partparams','requests.part_type','=','partparams.param')
		->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
        ->where('locationparams.user_id',$user->id)    
	   ->where('brandparams.user_id',$user->id)
		->where('partparams.user_id',$user->id)
		->where('requests.added_by','!=',$user->id)
		->where('requests.status','=','1')
        ->where('domainparams.user_id',$user->id)->count();
		}
		
   
       
            return view('platform/frontend/requests/local_requests',compact('requests_count'));
      
   
        
    }
	 public function nationalRequests(Request $request){
		$pg=18;
		$sort='desk';
		if(isset($_GET['limit'])){
			$limit=$_GET['limit'];
			if($limit=='all'){
				$pg=10000;
			}else{
				$pg=$_GET['limit'];
			}
			
		}
		if(isset($_GET['sorting'])){
			$sort=$_GET['sorting'];
		}
		
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();
		$brandparam=Brandparam::where('user_id',$user->id)->where('brand_id','99999999999')->first();
		$partparam=Partparam::where('user_id',$user->id)->where('param','99999999999')->first();

        if($brandparam && !$partparam){		
			$requests=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->leftjoin('partparams','requests.part_type','=','partparams.param')
				->where('partparams.user_id',$user->id)
				->where('requests.added_by','!=',$user->id)
				->where('requests.status','=','1')
				->where('domainparams.user_id',$user->id)->orderBy('request_id',$sort)->paginate($pg);
		}
		
		if($partparam && !$brandparam){		
			$requests=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
				->where('domainparams.user_id',$user->id)
				->where('requests.added_by','!=',$user->id)
				->where('brandparams.user_id',$user->id)
				->where('requests.status','=','1')->orderBy('request_id',$sort)->paginate($pg);
		
		}

		if($brandparam && $partparam){
			$requests=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->where('requests.added_by','!=',$user->id)
				->where('requests.status','=','1')	
				->where('domainparams.user_id',$user->id)->orderBy('request_id',$sort)->paginate($pg);
		
		}
		
		if(!$partparam && !$brandparam){
			$requests=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->leftjoin('partparams','requests.part_type','=','partparams.param')
				->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
				->where('brandparams.user_id',$user->id)
				->where('partparams.user_id',$user->id)
				->where('requests.added_by','!=',$user->id)
				->where('requests.status','=','1')
				->where('domainparams.user_id',$user->id)->orderBy('request_id',$sort)->paginate($pg);
		}
		

      
		//count requests
		if($partparam && !$brandparam){
			$requests_count=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
				->where('brandparams.user_id',$user->id)		 
				->where('domainparams.user_id',$user->id)->count();
		}

		if($brandparam && !$partparam){		
			$requests_count=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->leftjoin('partparams','requests.part_type','=','partparams.param')
				->where('partparams.user_id',$user->id)
				->where('requests.added_by','!=',$user->id)
				->where('requests.status','=','1')
				->where('domainparams.user_id',$user->id)->count();
		}

		if($partparam && $brandparam){		
			$requests_count=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
				->where('domainparams.user_id',$user->id)
				->where('requests.added_by','!=',$user->id)
				->where('brandparams.user_id',$user->id)
				->where('requests.status','=','1')->count();
		
		}

		if($brandparam && $partparam){
			// die;
			$requests_count=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->where('requests.added_by','!=',$user->id)
				->where('requests.status','=','1')	
				->where('domainparams.user_id',$user->id)->count();
		}

		if(!$partparam && !$brandparam){

			$requests_count=DB::table('requests')
				->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
				->leftjoin('partparams','requests.part_type','=','partparams.param')
				->leftjoin('brandparams','requests.brand','=','brandparams.brand_id')
				->where('brandparams.user_id',$user->id)
				->where('partparams.user_id',$user->id)
				->where('requests.added_by','!=',$user->id)
				->where('requests.status','=','1')
				->where('domainparams.user_id',$user->id)->count();
		}
		
		// var_dump($requests->items());
		// die;
            return view('platform/frontend/requests/national_requests',compact('gs','user','requests','requests_count'));
      
      
        
    }
    public function waitingList($request_id){
        $user=auth()->user();
        $inset=DB::table('waiting_list')->insert(['request'=>$request_id,'requester'=>$user->id]);
        return back();
    }
    public function requestDetails($request_url){
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();

        $request=Requestmodel::where('request_url',$request_url)->first();
        $domain=Domain::where('id',$request->request_domain)->first();
        $client=User::where('id',$request->added_by)->first();
		$checks=DB::table('checks')->where('number',$request->request_number)->get();
       
        
        return view('platform/frontend/details/request_details',compact('checks','request','domain','user','gs','client'));
    }

	public function sentRequests()
	{
		$user=auth()->user();

		return view('platform/frontend/users/personalcontent/sent_requests',compact('user'));
	}

	public function adminRequests()
	{
		$requests = Requestmodel::all();
		
		return view('platform/frontend/users/personalcontent/sent_requests',compact('requests'));
	}
}
