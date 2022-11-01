<?php

namespace App\Models\Platform;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Requestmodel extends Model
{
        protected $guarded = ['request_id'];

        protected $table='requests';

        public function client()
        {
            return $this->belongsTo(User::class,'added_by','id');
        }
        public function domain()
        {
            return $this->belongsTo(Domain::class,'request_domain','id');
        }
        public function location()
        {
            return $this->belongsTo(Region::class,'request_location','region_id');
        }

        public function city()
        {
            return $this->belongsTo(City::class,'request_city','city_id');
        }

        public function brand()
        {
            return $this->belongsTo(Brand::class,'brand','id');
        }

        public function part()
        {
            return $this->hasMany(Part::class,'request','request_number');
        }
        public function equipment()
        {
            return $this->hasOne(Equipment::class,'request','request_number');
        }
        public function data()
        {
            return $this->hasMany(Requestdata::class,'request','request_number')->orderBy('data_id','asc');
        }
        public function requestimage()
        {
            return $this->hasMany(Requestimage::class,'request','request_number');
        }
        public function offer()
        {
            return $this->hasMany(Offer::class,'request','request_id');
        }
}
