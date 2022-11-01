<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Requestform extends Model
{
    protected $guarded = ['id'];

    public $timestamps=false;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function component()
    {
        return $this->hasMany(Requestformcomponent::class,'form_id','id')->orderBy('position','asc');
    }
}
