<?php

namespace App\Models\Platform;

use App\Models\Generalsetting;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;

    public function generalsetting(){
        return $this->belongsTo(Generalsetting::class);
    }
    public function subcategory(){
        return $this->hasMany(Subcategory::class)->orderBy('position','asc');
    }
    public function domain(){
        return $this->hasMany(Domain::class)->orderBy('position','asc');
    }
}
