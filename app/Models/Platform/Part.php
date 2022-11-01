<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $guarded =['part_id'];
    public $timestamps = false;

    public function request()
    {
        return $this->belongsTo(Requestmodel::class,'request_number','request');
    }
}
