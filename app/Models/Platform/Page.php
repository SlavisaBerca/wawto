<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id'];

    public $timestamps=false;
	
	protected $table='pages';

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function slide()
    {
        return $this->hasMany(Slide::class);
    }

    public function box() 
    {
        return $this->hasMany(Box::class);
    }

    public function banner()
    {
        return $this->hasMany(Banner::class);
    }

    public function section() 
    {
        return $this->hasMany(Section::class)->orderBy('position','asc');
    }
}
