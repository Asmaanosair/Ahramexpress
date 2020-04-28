<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class client  extends Authenticatable
{
    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at', 'password', 'email', 'phone', 'number', 'status', 'address',
    ];

    public $timestamps = false;
    protected $guard = 'client';


    public function city()
    {
        return $this->belongsTo(city::class);
    }

    public function country()
    {
        return $this->belongsTo(country::class);
    }


    public function district()
    {
        return $this->belongsTo(district::class);

    }
}
