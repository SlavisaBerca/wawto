<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Offerdata extends Model
{
        protected $guarded = ['od_id'];

        public $timestamps = false;

        public function offer()
        {
            return $this->belongsTo(Offer::class);
        }
}
