<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;

class Curier extends Model
{
        public $timestamps = false;

        protected $guarded =['id'];

        protected $table='curier';
}
