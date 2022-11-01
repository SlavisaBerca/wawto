<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\Platform\Requestmodel;
use App\Models\Platform\Command;
use App\Models\Platform\Checkout;
class GeneralsettingController extends Controller
{
    public function showSettings()
	{
		$settings = Generalsetting::findOrFail(1);
		return view('platform/backend/settings/generalsettings',compact('settings'));
	}
	public function setPlatform(Request $request, $id){
		$set = Generalsetting::findOrFail($id);
	}
	
	public function showRequests()
	{
		$requests = Requestmodel::all();
		
		return view('platform/backend/sales/requests_page',compact('requests'));
	}
	public function showCommands()
	{
		$commands = Command::all();
		
		return view('platform/backend/sales/commands_page',compact('commands'));
	}
	public function showCheckouts()
	{
		$checkouts = Checkout::all();
		
		return view('platform/backend/sales/checkouts_page',compact('checkouts'));
	}
}
