<?php

namespace App\Http\Controllers\Platform\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Models\Platform\Domain;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Platform\Domainparam;

class SuppliersController extends Controller
{
        public function show()
        {
            if(isset($_GET['limit']))
            {
                if($_GET['limit'] == 'all'){
                    $pg ='10000000000000';
                }
                else
                {
                    $pg = $_GET['limit'];
                }
                
            }
            else
            {
                $pg=24;
            }
            
            if(isset($_GET['order']))
            {
                $order =  $_GET['order'];
            }
            else
            {
                $order='desc';
            }

            $count = User::where('account_type',1)->count();

            $suppliers = User::where('account_type',1)->orderBy('created_at',$order)->paginate($pg);

            return view('platform.frontend.users.suppliers',compact('count','suppliers'));
        }

        public function domainSuppliers($domain_url)
        {
            if(isset($_GET['limit']))
            {
                if($_GET['limit'] == 'all'){
                    $pg ='10000000000000';
                }
                else
                {
                    $pg = $_GET['limit'];
                }
                
            }
            else
            {
                $pg=24;
            }
            
            if(isset($_GET['order']))
            {
                $order =  $_GET['order'];
            }
            else
            {
                $order='desc';
            }
            $domain = Domain::where('domain_url',$domain_url)->first();
            $count = Domainparam::count();
            $suppliers = Domainparam::where('domain',$domain->id)->get();

            
           

            return view('platform.frontend.users.domain_suppliers',compact('count','suppliers','domain'));
        }

        public function searchSuppliers()
        {
         
            $search = $_GET['search'];

            $count = User::where('key_words','LIKE','%'.$search.'%')->where('account_type',1)->count();

            $suppliers = User::where('key_words','LIKE','%'.$search.'%')->where('account_type',1)->get();

            return view('platform.frontend.users.search_suppliers',compact('suppliers','count'));
        }
        
}
