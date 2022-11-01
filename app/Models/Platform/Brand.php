<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded=['brand_id'];
    
    public $timestamps=false;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
