<?php

namespace App\Models\Platform;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Rating extends Model
{
   public $timestamps=false;
   protected $guarded=['rating_id'];

   public function user(){
       return $this->belongsTo(User::class);
   }
}
