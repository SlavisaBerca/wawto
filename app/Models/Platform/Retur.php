<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Retur extends Model
{
        protected $guarded =['id'];

        public function supplier()
        {
            return $this->belongsTo(User::class,'supplier_id','id');
        }

        public function client()
        {
            return $this->belongsTo(User::class,'client_id','id');
        }
		
		public function command()
		{
			return $this->belongsTo(Command::class,'command_id','command_id');
		}
}
