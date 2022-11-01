<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;

    public function category(){
        return $this->belongsTo(Category::class);

    }

    public function generalsetting(){
        return $this->belongsTo(Generalsetting::class);
    }
    public function domain(){
        return $this->hasMany(Domain::class)->orderBy('position','asc');
    }
}
