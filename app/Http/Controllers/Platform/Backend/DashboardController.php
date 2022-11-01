<?php

namespace App\Http\Controllers\Platform\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class DashboardController extends Controller
{
    public function dashboard(){
		
		$suppliers = User::where('user_type',1)->where('wawto_status',0)->get();
		
        return view('platform.backend.dashboard',compact('suppliers'));
    }
	
	 public function unapproved(){
		
		$suppliers = User::where('user_type',1)->where('wawto_status',0)->get();
		
        return view('platform/backend/admin_informator/suppliers_preview',compact('suppliers'));
    }
	
	public function approve($id)
	{
		$approve = User::where('id',$id)->update(['wawto_status'=>1]);
		return back();
	}
    public function icons()
    {
        return view('platform/backend/examples/icons');
    }
	
	public function approval($id)
	{
		$user = User::findOrFail($id);
		
		return view('platform/backend/admin_informator/account_approval',compact('user'));
	}
	
	public function suppliers()
	{
	$suppliers = User::where('account_type',1)->get();
		
		return view('platform/backend/admin_informator/suppliers_preview',compact('suppliers'));	
	}
	
	public function clients()
	{
	$clients = User::where('account_type',2)->get();
		
		return view('platform/backend/admin_informator/clients_preview',compact('clients'));	
	}
	public function blocked()
	{
	$clients = User::where('wawto_status',2)->get();
		
		return view('platform/backend/admin_informator/blocked_users',compact('clients'));	
	}

    
}
