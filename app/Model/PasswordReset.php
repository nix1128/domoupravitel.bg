<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    protected $guarded = [];


    /**
     * Get the user that owns the phone.
     */
    public function passwordReset()
    {
//        return $this->belongsTo(Hause_users::class ,'user_id'  );
    }
}
