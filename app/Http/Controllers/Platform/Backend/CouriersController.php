<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Models\Platform\Curier;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CouriersController extends Controller
{
        public function show()
        {
            $couriers = Curier::all();

            return view('platform/backend/settings/couriers',compact('couriers'));
        }

        public function update(Request $request, $id)
        {
            $courier = Curier::findOrFail($id);

            if($request->is_default && !$courier->is_default)
            {
                $set = DB::table('curier')->update(['is_default'=>0]);
                $is_default = $request->is_default;
            }
            else
            {
                $is_default = $courier->is_default;
            }

            $update = Curier::findOrFail($id)->update(
                [
                    'name'=>$request->name,
                    'pay_load'=>$request->pay_load,
                    'payload_limit'=>$request->payload_limit,
                    'overload'=>$request->over_load,
                    'is_default'=>$is_default,
                ]
            );

            return back()->with('success','Curierul a fost editat...');
        }

        public function store(Request $request)
        {
            $courier = new Curier;

            $courier->pay_load = $request->pay_load;

            $courier->payload_limit = $request->payload_limit;
            
            $courier->overload = $request->over_load;

            $courier->name = $request->name;

            if($request->is_default) 
            {
                $update = DB::table('curier')->update(['is_default'=>0]);
                $is_default = $request->is_default;
            }
            else 
            {
                $is_default = 0;
            }
            $courier->is_default = $is_default;
            $courier->save();

            return back()->with('success','Curirerul a fost adaugat...');
        }

        public function destroy($id)
        {
            $courier = Curier::findOrFail($id)->delete();

            return back()->with('success','Curirerul a fost sters..');
        }
}
