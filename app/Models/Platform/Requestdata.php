<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Requestdata extends Model
{
    protected $guarded = ['data_id'];

        public $timestamps = false;

        public function request()
        {
            return $this->belongsTo(Requestmodel::class,'request_number','request');
        }
}
