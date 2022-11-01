<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;
use  App\Models\Generalsetting;
class Link extends Model
{
    protected $guarded=['link_id'];
    public $timestamps=false;
    public function generalsetting(){
        return $this->belongsTo(Generalsetting::class);
    }
}
