<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Offer extends Model
{
        public $timestsamps = false;

        protected $guarded = ['id'];

        public function sentrequest()
        {
            return $this->belongsTo(Requestmodel::class,'request','request_id');
        }

        public function offerimage()
        {
            return $this->hasMany(Offerimage::class,'offer','number');
        }

        public function offerdata()
        {
            return $this->hasMany(Offerdata::class,'offer','number')->orderBy('od_id','asc');
        }
		
		public function supplier()
		{
			return $this->belongsTo(User::class,'supplier_id','id');
		}
}
