<?php

namespace App;

use App\Model\Hause_users;
use Illuminate\Database\Eloquent\Model;

class User_card extends Model
{
    protected $guarded = [];
    //protected $fillable = ['image'];

    public function user()
    {

        return $this->belongsTo(Hause_users::class, 'user_id'  );
    }


}


