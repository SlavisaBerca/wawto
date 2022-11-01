<?php

namespace App\Models\Platform;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Blocked extends Model
{
        public $timestamps = false;

        protected $table = 'blocked_users';

        public function user()
        {
            return $this->belongsTo(User::class,'id','blocked');
        }
}
