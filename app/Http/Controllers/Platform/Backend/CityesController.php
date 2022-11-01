<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platform\Region;
use App\Models\Platform\City;
use App\Models\Generalsetting;
class CityesController extends Controller
{
	  public function __construct(){
        $this->middleware('auth');
        
    }
	  public function show(){
        $citys=City::all();
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();
        if($user->role){
            return view('platform/backend/pages/localization/cities',compact('gs','user','citys'));
        }
    }
	public function update(Request $request, $city_id){
		$city=City::where('city_id',$city_id)->first();
		if($request->region_id){
			$region_id=$request->region_id;
		}else{
			$region_id=$city->region_id;
		}
		$upd=City::where('city_id',$city_id)->update([
			'city_name'=>$request->city_name,
			'region_id'=>$region_id,
		]);
		return back();
	}
	public function destroy($city_id){
		
		$del=City::where('city_id',$city_id)->delete();
		return back();
	}
	public function add(Request $request){
		$city=new City;

		$city->region_id=$request->region_id;
		$city->city_name=$request->city_name;
		
		$city->save();
		return back();
	}
}