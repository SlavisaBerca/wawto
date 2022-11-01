<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Offerimage extends Model
{
    protected $guarded = ['oi_id'];

    public $timestamps = false;

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
