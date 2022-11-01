<?php

namespace App\Models;

use App\Models\Platform\Box;
use App\Models\Platform\Menu;
use App\Models\Generalsetting;
use App\Models\Platform\Brand;
use App\Models\Platform\Slide;
use App\Models\Platform\Banner;
use App\Models\Platform\Domain;
use App\Models\Platform\Link;
use App\Models\Platform\Footer;
use App\Models\Platform\Section;
use App\Models\Platform\Category;
use App\Models\Platform\Subcategory;
use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;
   
    public function category(){
        return $this->hasMany(Category::class)->orderBy('position','asc');
    }
	public function link(){
        return $this->hasMany(Link::class);
    }
	
	public function footer(){
		return $this->hasMany(Footer::class);
	}
	
    public function subcategory(){
        return $this->hasMany(Subcategory::class)->orderBy('position','asc');
    }
    public function domain(){
        return $this->hasMany(Domain::class)->orderBy('position','asc');
    }

    public function box()
    {
        return $this->hasMany(Box::class);
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function slide()
    {
        return $this->hasMany(Slide::class);
    }

    public function banner()
    {
        return $this->hasMany(Banner::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }

    public function brand()
    {
        return $this->hasMany(Brand::class);
    }
}
