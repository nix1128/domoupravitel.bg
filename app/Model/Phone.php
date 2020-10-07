<?php

namespace App;

use App\Model\Hause_users;
use Illuminate\Database\Eloquent\Model;



class Phone extends Model
{


    protected $guarded = [];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(Hause_users::class, 'user_id'  );
    }
}

