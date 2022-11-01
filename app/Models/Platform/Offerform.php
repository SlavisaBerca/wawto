<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Offerform extends Model
{
    protected $guarded = ['of_id'];

    public $timestamps=false;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function components()
    {
        return $this->hasMany(Offerformcomponent::class,'of_id','of_id')->orderBy('position','asc');
    }
}
