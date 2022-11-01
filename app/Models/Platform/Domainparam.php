<?php

namespace App\Models\Platform;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Domainparam extends Model
{
        protected $guarded=['param_id'];

        public $timestamps = false;

        public function domain()
        {
            return $this->belongsTo(Domain::class,'domain','id');
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
}
