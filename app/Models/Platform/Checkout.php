<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Checkout extends Model
{
        protected $guarded = ['ck_id'];

        public function command()
        {
            return $this->belongsTo(Command::class,'command_id','command_id');
        }
		
		public function checkedclient()
		{
				return $this->belongsTo(User::class,'client_id','id');
		}
		public function checkedsupplier()
		{
			return $this->belongsTo(User::class,'supplier_id','id');
		}
}
