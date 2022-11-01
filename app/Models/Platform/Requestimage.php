<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Requestimage extends Model
{
        protected $guarded = ['image_id'];

        public $timestamps = false;

        public function request()
        {
            return $this->belongsTo(Requestmodel::class,'request_number','request');
        }
}
