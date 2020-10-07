<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;


class Vote extends Model
{
    protected $guarded =  [];

    public function user()
    {
        return $this->belongsTo(Hause_users::class, 'user_id'  );
    }




}
