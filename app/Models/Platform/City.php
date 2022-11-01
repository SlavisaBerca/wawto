<?php

namespace App\Models\Platform;

use App\User;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = ['region_id'];
        
    public $timestamps=false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
