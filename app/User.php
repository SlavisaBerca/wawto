<?php

namespace App;

use App\Models\Platform\City;
use App\Models\Platform\Offer;
use App\Models\Platform\Retur;
use App\Models\Platform\Rating;
use App\Models\Platform\Region;
use App\Models\Platform\Blocked;
use App\Models\Platform\Command;
use App\Models\Platform\Checkout;
use App\Models\Platform\Partparam;
use App\Models\Platform\Brandparam;
use App\Models\Platform\Domainparam;
use App\Models\Platform\Notification;
use App\Models\Platform\Requestmodel;
use App\Models\Platform\Locationparam;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notification()
    {
        return $this->hasMany(Notification::class)->orderBy('notification_id','desc');
    }

    public function region()
    {
        return $this->hasOne(Region::class,'region_id','user_region');
    }

    public function city()
    {
        return $this->hasOne(City::class,'city_id','user_city');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function domainparam()
    {
        return $this->hasMany(Domainparam::class);
    }
    public function locationparam()
    {
        return $this->hasMany(Locationparam::class);
    }

    public function partparam()
    {
        return $this->hasMany(Partparam::class);
    }
    public function brandparam()
    {
        return $this->hasMany(Brandparam::class);
    }

    public function myrequest()
    {
        return $this->hasMany(Requestmodel::class,'added_by','id');
    }

    public function blocked()
    {
        return $this->hasOne(Blocked::class,'id','blocked');
    }

    public function blocker()
    {
        return $this->hasOne(Blocked::class,'id','blocker');
    }

    public function sentcommand()
    {
        return $this->hasMany(Command::class,'client_id','id');
    }

    public function getcommand()
    {
        return $this->hasMany(Command::class,'supplier_id','id');
    }
    
    public function offerclient()
    {
        return $this->hasMany(Offer::class,'client_id','id');
    }

    public function commandclient()
    {
        return $this->hasMany(Command::class,'client_id','id');
    }

    public function unconfirmed()
    {
        return $this->hasMany(Command::class,'supplier_id','id')->where('status',0)->where('confirm_limit','>',date('Y-m-d H:i:s'));
    }

    public function myoffer()
    {
        return $this->hasMany(Offer::class,'client_id','id')->orderBy('value','desc');
    }

    public function sentretur()
    {
        return $this->hasMany(Retur::class,'id','client_id');
    }
    public function getretur()
    {
        return $this->hasMany(Retur::class,'supplier_id','id');
    }

    public function offersupplier()
    {
        return $this->hasMany(Offer::class,'supplier_id','id');
    }

    public function checkoutsupplier()
    {
        return $this->hasMany(Checkout::class,'supplier_id','id');
    }
	 public function checkoutclient()
    {
        return $this->hasMany(Checkout::class,'client_id','id');
    }

   
}
