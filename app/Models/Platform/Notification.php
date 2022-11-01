<?php

namespace App\Models\Platform;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = ['notification_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
