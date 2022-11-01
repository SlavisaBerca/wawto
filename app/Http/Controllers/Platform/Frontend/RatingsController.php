<?php

namespace App\Http\Controllers\Platform\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platform\Rating;
use App\Models\Platform\Checkout;
use App\Mail\Platform\ReitingInfo;
use Mail;
use App\User;
use Session;
class RatingsController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function addOne($id){
        $rating = new Rating;
        $user=auth()->user();
        $check=Rating::where('rated_by',$user->id)->first();
        $checkout=Checkout::where('supplier_id',$id)->count();
        $client_checkout=Checkout::where('client_id',$id)->count();
        if($check && $checkout || $check && $client_checkout){
			
            $rating=Rating::where('user_id',$id)->where('rated_by',$user->id)->update(['rating'=>1]);
            $approved='';
            Session::put('approved',$approved);
        }if(!$check && $checkout || !$check && $client_checkout){
            $rating->insert(['rated_by'=>$user->id,'user_id'=>$id,'rating'=>1]);
            $approved='';
            Session::put('approved',$approved);
            $to=User::where('id',$id)->first();
            $message='Stimati client '.$to->name.' Utilizator '.$user->name.' A aplicat 1 stelutza la reiting Dumneavoastra.';
        
        }if(!$check && !$checkout || !$check && !$client_checkout){
          $unapproved='';
          Session::put('unapproved',$unapproved) ;
        }
        if(session()->has('unapproved')){
            return back()->with(compact('unapproved'));
        }
        if(session()->has('approved')){
            return back()->with(compact('approved'));
        }else{
            $error='';
            Session::put('error',$error);
            return back()->with(compact('error'));
        }
        
    }
    public function addTwo($id){
        $rating = new Rating;
        $user=auth()->user();
        $check=Rating::where('rated_by',$user->id)->first();
        $checkout=Checkout::where('supplier_id',$id)->count();
        $client_checkout=Checkout::where('client_id',$id)->count();
        if($check && $checkout || $check && $client_checkout){
            $rating=Rating::where('user_id',$id)->where('rated_by',$user->id)->update(['rating'=>2]);
            $approved='';
            Session::put('approved',$approved);
        }if(!$check && $checkout || !$check && $client_checkout){
            $rating->insert(['rated_by'=>$user->id,'user_id'=>$id,'rating'=>2]);
            $approved='';
            Session::put('approved',$approved);
            $to=User::where('id',$id)->first();
            $message='Stimati client '.$to->name.' Utilizator '.$user->name.' A aplicat 2 stelutze la reiting Dumneavoastra.';
 
        }if(!$check && !$checkout || !$check && !$client_checkout){
          $unapproved='';
          Session::put('unapproved',$unapproved) ;
        }
        if(session()->has('unapproved')){
            return back()->with(compact('unapproved'));
        }
        if(session()->has('approved')){
            return back()->with(compact('approved'));
        }else{
            $error='';
            Session::put('error',$error);
            return back()->with(compact('error'));
        }
        
      
    }
    public function addThree($id){
        $rating = new Rating;
        $user=auth()->user();
        $check=Rating::where('rated_by',$user->id)->first();
        $checkout=Checkout::where('supplier_id',$id)->count();
        $client_checkout=Checkout::where('client_id',$id)->count();
        if($check && $checkout || $check && $client_checkout){
            $rating=Rating::where('user_id',$id)->where('rated_by',$user->id)->update(['rating'=>3]);
            $approved='';
            Session::put('approved',$approved);
        }if(!$check && $checkout || !$check && $client_checkout){
            $rating->insert(['rated_by'=>$user->id,'user_id'=>$id,'rating'=>3]);
            $approved='';
            Session::put('approved',$approved);
            $to=User::where('id',$id)->first();
            $message='Stimati client '.$to->name.' Utilizator '.$user->name.' A aplicat 3 stelutze la reiting Dumneavoastra.';
         
        }if(!$check && !$checkout || !$check && !$client_checkout){
          $unapproved='';
          Session::put('unapproved',$unapproved) ;
        }
        if(session()->has('unapproved')){
            return back()->with(compact('unapproved'));
        }
        if(session()->has('approved')){
            return back()->with(compact('approved'));
        }else{
            $error='';
            Session::put('error',$error);
            return back()->with(compact('error'));
        }
       
    }
    public function addFour($id){
        $rating = new Rating;
        $user=auth()->user();
        $check=Rating::where('rated_by',$user->id)->first();
        $checkout=Checkout::where('supplier_id',$id)->count();
        $client_checkout=Checkout::where('client_id',$id)->count();
        if($check && $checkout || $check && $client_checkout){
            $rating=Rating::where('user_id',$id)->where('rated_by',$user->id)->update(['rating'=>4]);
            $approved='';
            Session::put('approved',$approved);
        }if(!$check && $checkout || !$check && $client_checkout){
			
            $rating->insert(['rated_by'=>$user->id,'user_id'=>$id,'rating'=>4]);
            $approved='';
            Session::put('approved',$approved);
            $to=User::where('id',$id)->first();
            $message='Stimati client '.$to->name.' Utilizator '.$user->name.' A aplicat 4 stelutze la reiting Dumneavoastra.';
        
        }if(!$check && !$checkout || !$check && !$client_checkout){
          $unapproved='';
          Session::put('unapproved',$unapproved) ;
        }
        if(session()->has('unapproved')){
            return back()->with(compact('unapproved'));
        }
        if(session()->has('approved')){
            return back()->with(compact('approved'));
        }else{
            $error='';
            Session::put('error',$error);
            return back()->with(compact('error'));
        }
    }
    public function addFive($id){
        $rating = new Rating;
        $user=auth()->user();
  
       
        $check=Rating::where('rated_by',$user->id)->first();
        $checkout=Checkout::where('supplier_id',$id)->count();
        $client_checkout=Checkout::where('client_id',$id)->count();
        if($check && $checkout || $check && $client_checkout){

            $rating=Rating::where('user_id',$id)->where('rated_by',$user->id)->update(['rating'=>5]);
            $approved='';
            Session::put('approved',$approved);
        }if(!$check && $checkout || !$check && $client_checkout){
            $rating->insert(['rated_by'=>$user->id,'user_id'=>$id,'rating'=>5]);
            $approved='';
            Session::put('approved',$approved);
            $to=User::where('id',$id)->first();
            $message='Stimati client '.$to->name.' Utilizator '.$user->name.' A aplicat 5 stelutze la reiting Dumneavoastra.';
          
        }if(!$check && !$checkout || !$check && !$client_checkout){
          $unapproved='';
          Session::put('unapproved',$unapproved) ;
        }
        if(session()->has('unapproved')){
            return back()->with(compact('unapproved'));
        }
        if(session()->has('approved')){
            return back()->with(compact('approved'));
        }else{
            $error='';
            Session::put('error',$error);
            return back()->with(compact('error'));
        }
        
           
       
       
    }
}
