<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class delivery_boy  extends Authenticatable

{
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at', 'password', 'email', 'phone', 'number', 'status', 'address','api_token'
    ];
    public $timestamps=false;




    protected $guard = 'delivery_boy';

    public function order()
    {
        return $this->hasMany(order::class);
    }

    public function sub_order()
    {
        return $this->hasMany(sub_order::class);
    }

}
