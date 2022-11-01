<?php

namespace App\Models\Platform;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
        protected $guarded = ['region_id'];
        
        public $timestamps=false;

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function sentrequest()
        {
            return $this->hasMany(Requestmodel::class,'region_id','request_location');
        }
        public function city()
        {
            return $this->hasMany(City::class,'region_id','region_id');
        }
}
