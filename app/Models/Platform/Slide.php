<?php

namespace App\Models\Platform;

use App\Models\Generalsetting;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = ['slide_id'];

    public $timestamps = false;

    public function generalsetting()
    {
        return $this->belongsTo(Generalsetting::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
