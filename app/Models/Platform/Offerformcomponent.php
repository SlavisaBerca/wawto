<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Offerformcomponent extends Model
{
    public $timestamps = false;

    protected $guarded = ['oc_id'];

    public function offerform()
    {
        return $this->belongsTo(Offerform::class,'of_id','of_id');
    }
}
