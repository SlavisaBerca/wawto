<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class OldCity extends Model
{
		protected $table = 'old_city';
		
		public $timestamps = false;
		
		protected $guarded =['city_id'];
}
