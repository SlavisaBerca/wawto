<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Brandparam extends Model
{
    protected $guarded = ['param_id'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sentrequest()
    {
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
