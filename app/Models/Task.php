<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class task extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'user_id',
        'goal',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
