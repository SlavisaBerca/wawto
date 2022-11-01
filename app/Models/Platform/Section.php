<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = ['section_id'];

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
