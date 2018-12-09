<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

		protected $fillable = ['score','user_id','playtime','name'];

        public function user(){
        return $this->belongsTo(User::class);
    }
}
