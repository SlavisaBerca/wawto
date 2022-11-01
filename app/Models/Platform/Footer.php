<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;
use App\Models\Generalsetting;
class Footer extends Model
{
    protected $guarded=['footer_id'];
    public $timestamps=false;
    public function generalsetting(){
        return $this->belongsTo(Generalsetting::class);
    }
}
