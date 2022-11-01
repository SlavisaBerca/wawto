<?php

namespace App\Models\Platform;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
     protected $guarded =['command_id'];

     public function commandclient()
     {
         return $this->belongsTo(User::class,'client_id','id');
     }

     public function supplier()
     {
         return $this->belongsTo(User::class,'supplier_id','id');
     }

     public function offer()
     {
         return $this->hasOne(Offer::class,'id','offer_id');
     }
     public function request()
     {
         return $this->hasOne(Requestmodel::class,'request_id','request_id');
     }

     public function checked()
     {
         return $this->hasOne(Checkout::class,'command_id','command_id');
     }
	 
	 public function retur()
     {
		 return $this->hasOne(Retur::class,'command_id','command_id');
	 }
}
