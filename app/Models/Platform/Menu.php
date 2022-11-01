<?php

namespace App\Models\Platform;

use App\Models\Generalsetting;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];
    public $timestamps=false;

    public function generalsetting()
    {
        return $this->belongsTo(Generalsetting::class);
    }

    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
