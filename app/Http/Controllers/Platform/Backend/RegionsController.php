<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platform\Region;
use App\Models\Platform\City;
use App\Models\Generalsetting;
class RegionsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        
    }

    public function show(){
        $regions=Region::all();
        $gs=Generalsetting::findOrFail(1);
        $user=auth()->user();
        if($user->role){
            return view('platform/backend/pages/localization/regions',compact('gs','user','regions'));
        }
    }
	public function update(Request $request, $region_id){
		$upd=Region::where('region_id',$region_id)->update([
			'region_name'=>$request->region_name,
		]);
		return back();
	}
	public function destroy($region_id){
		$city=City::where('region_id',$region_id)->delete();
		$region=Region::where('region_id',$region_id)->delete();
		return back();
	}
	public function add(Request $request){
		$region=new Region;
		$region->region_name=$request->region_name;
		$region->country=1;
		$region->save();
		return back();
	}
}
