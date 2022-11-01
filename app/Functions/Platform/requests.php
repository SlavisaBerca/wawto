<?php 

use App\User;
use App\Models\Platform\City;
use App\Models\Platform\Part;
use App\Models\Generalsetting;
use App\Models\Platform\Offer;
use App\Models\Platform\Domain;
use App\Models\Platform\Region;
use App\Models\Platform\Partparam;
use Illuminate\Support\Facades\DB;
use App\Models\Platform\Brandparam;
use App\Models\Platform\Requestimage;
use App\Models\Platform\Requestmodel;

    function getLocalRequests()
    {
		$gs = Generalsetting::findOrFail(1);
        $pg=$gs->request_perpage;
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
		$brand_free=Requestmodel::where('brand',99999999999)->count();
		$part_free=Requestmodel::where('part_type',99999999999)->count();
		
		if($brand_free && $part_free)
		{
		$requests=DB::table('requests')
        
	
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')		
		->where('locationparams.user_id',$user->id)
		 ->where('domainparams.user_id',$user->id)->paginate($pg);
		

		}
				else if($brand_free)
		{
		$requests=DB::table('requests')
        
	
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')		
		->where('locationparams.user_id',$user->id)
		 ->where('domainparams.user_id',$user->id)->paginate($pg);
		

		}
				else if($part_free)
		{
		$requests=DB::table('requests')
        
	
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')		
		->where('locationparams.user_id',$user->id)
		 ->where('domainparams.user_id',$user->id)->paginate($pg);
		

		}
		else if($brandparam && $partparam){
		
		 $requests=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')
	
        ->where('locationparams.user_id',$user->id)
        ->where('domainparams.user_id',$user->id)->paginate($pg);
		}
		
		else if(!$brandparam && $partparam)
		{
			$requests=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')
		->leftjoin('brandparams','brandparams.brand_id','requests.brand')
		->where('brandparams.user_id',$user->id)
        ->where('locationparams.user_id',$user->id)
        ->where('domainparams.user_id',$user->id)->paginate($pg);
		}
		else if($brandparam && !$partparam)
		{
			
			$requests=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')
		->leftjoin('partparams','partparams.param','requests.part_type')
		->where('partparams.user_id',$user->id)
        ->where('locationparams.user_id',$user->id)
        ->where('domainparams.user_id',$user->id)->paginate($pg);
		}

		else if(!$brandparam && !$partparam)
		{
			$requests=DB::table('requests')
        ->leftjoin('domainparams','requests.request_domain','=','domainparams.domain')
        ->leftjoin('locationparams','locationparams.location','=','requests.request_location')
		->leftjoin('partparams','partparams.param','requests.part_type')
		->leftjoin('brandparams','brandparams.brand_id','requests.brand')
		->where('brandparams.user_id',$user->id)
		->where('partparams.user_id',$user->id)
        ->where('locationparams.user_id',$user->id)
        ->where('domainparams.user_id',$user->id)->paginate($pg);
		}
		
      
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
		if(!$partparam && !$brandparam){
		
	
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
		
	
      foreach($requests as $request){

        $region = Region::where('region_id',$request->request_location)->first();

        if($region)
        {
            $region_name = $region->region_name;
        }
        else 
        {
            $region_name = 'Judet nu exista';
        }

        $city = City::where('city_id',$request->request_city)->first();

        if($city)
        {
            $city_name = $city->city_name;
        }
        else 
        {
            $city = 'Orasul nu exista';
        }

        $client = User::where('id',$request->added_by)->first();

        if($client)
        {
            $client_name = $client->name;
        }
        else 
        {
            $client_name = 'Necunoscut';
        }
        $request_image = Requestimage::where('request',$request->request_number)->first();

        $part = Part::where('request',$request->request_number)->first();

        $domain = Domain::where('id',$request->request_domain)->first();
        
        
            $image = '<img src="../platform/frontend/assets/images/domains/'.$domain->domain_picture.'" style="min-height:200px; max-height:200px; width:100%;">';
       

        $offers = Offer::where('request',$request->request_id)->count();

        $start_rate=$client->rating->sum('rating');

        $devide=$client->rating()->count();

        if($devide > 0)
        {

            $rating=$start_rate/$devide;
        }
       
       
        else{
            $rating  = '
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
           <i class="far fa-star"></i>
            ';
        }

        if($client->rating->count()){
                   
              
        if($rating > 0 && $rating < 1.6){
            $rating ='
             <i class="far fa-star"></i>
             <i class="far fa-star"></i>
             <i class="far fa-star-half"></i>
             <i class="far fa-star"></i>
            <i class="far fa-star-half"></i>
            ';
        }
        if($rating > 1.5 && $rating < 2.1){
        $rating = '
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        ';
       
        }
        if($rating > 2 && $rating < 2.6){
        $rating ='
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        ';
        }
        if($rating > 2.5 && $rating < 3.1){
        $rating ='
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="far fa-star-half"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        ';
        }
        if($rating > 3 && $rating < 3.6){
        $rating = '
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        ';
        }
        if($rating > 3.5 && $rating < 4.1){
        $rating ='
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half"></i>
        <i class="far fa-star"></i>
        ';
        }
        if($rating > 4.0 && $rating < 4.6){
        $rating ='
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="far fa-star"></i>
        ';
        }
        if($rating > 4.6){
        $rating = '
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half"></i>
        ';
        }
        else 
        $rating  ='
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
         <i class="far fa-star"></i>
         ';
        }
        $domain = Domain::where('id',$request->request_domain)->first();
        if($domain)
        {
            $domain_title = $domain->domain_title;
        }
        else
        {
            $domain_title = 'Necunoscut';
        }
        //Endif ratings
        $free_space = $gs->request_capacity-$offers;
        
        if($offers > $gs->request_capacity)
        {
            $button='<a class="btn btn-sm btn-danger text-center text-white href="" style="width:80%;"><i class="fa fa-exclamation-triangle"></i> Limit a fost atinsa</a>';
        }
        else
        {
            $button=' <a class="btn btn-sm btn-info text-center text-white"  href="/request-details/'.$request->request_url.'" style="width:80%;"><i class="fa fa-eye"></i> Vizualizare</a>';
        }
           echo 

           '
                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                   <div class="card">
                                 <div class="card-header">
                                     <h5>Nr. '.$request->request_number.'</h5>
                                 </div>
                                 <div class="card-body">
                                 '.$image.'
                                 <table class="table table-bordered">
                                 <tr>
                                 <th>Judet:</th>
                                 <th>'.$region_name.'</th>
                                 </tr>
                                 <th>Oras:</th>
                                 <th>'.$city_name.'</th>
                                 </tr>
                                 <tr>
                                 <th>Client: </th>
                                 <th>'.$client_name.'</th>
                               
                                </tr>
                                <tr>
                                <th>Reiting:</th>
                                <th>'.$rating.'</th>
                                </tr>
                                <tr>
                                <th>Capacitate:</th>
                                <th>'.$gs->request_capacity.' Oferte</th>
                                </tr>
                                <tr>
                                <th>Oferte Primite:</th>
                                <th>'.$offers.'</th>
                                </tr>
                                <tr>
                                <th>Liber:</th>
                                <th>'.$free_space.'</th>
                                </tr>
                                 </table>
                                 </div>
                                 <div class="card-footer">
                                 <div class="locations d-flex">
                                    <h6>'.$domain_title.'</h6>
                                </div>
                                    '.$button.'
                                   
                                 </div>
                             </div>
                                </div>
                            </div>

           ';
         }
    }



?>