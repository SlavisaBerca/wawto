<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = ['equipment_id'];

    protected $table = 'equipments';

    public $timestamps = false;

    public function myrequest()
    {
        return $this->belongsTo(Requestmodel::class,'request_number','request');
    }
}
