<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platform\OldCity;
use App\Models\Platform\Region;
class OldCityEdit extends Controller
{
    public function view()
	{
		$region = Region::all();
		
		$city = OldCity::all();
		
		return view('platform/backend/old_cities/old_city',compact('city','region'));
	}
	
	public function edit(Request $request, $city_id)
	{
			$city = OldCity::where('city_id',$city_id)->first();
			
			if($request->region_id)
			{
				$region_id = $request->region_id;
			}
			else 
			{
				$region_id = $city->region_id;
			}
			
			
			$city->name = $request->city_name;
			
			$city = OldCity::where('city_id',$city_id)->update([
				'region_id'=>$region_id,
				'city_name'=>$request->city_name,
			]);
			
			return back()->with('success','Orasul a fost editat!!!');
	}
}
