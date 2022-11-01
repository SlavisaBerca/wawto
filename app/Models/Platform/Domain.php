<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $guarded=['id'];
    public $timestamps=false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function requestform()
    {
        return $this->hasOne(Requestform::class);
    }

    public function offerform()
    {
        return $this->hasOne(Offerform::class);
    }

    public function domainparam()
    {
        return $this->hasMany(Domainparam::class,'domain','id');
    }
    public function brand()
    {
        return $this->hasMany(Brand::class);
    }

    public function sentrequest()
    {
        return $this->hasMany(Requestmodel::class,'request_domain','id');
    }
   
}
