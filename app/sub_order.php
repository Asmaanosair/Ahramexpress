<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_order extends Model
{
    public function delivery_boy()
    {
        return $this->belongsTo(delivery_boy::class);
    }


    public function city()
    {
        return $this->belongsTo(city::class);
    }
    public function country()
    {
        return $this->belongsTo(country::class);
    }

    public function status()
    {
        return $this->belongsTo(status::class);
    }


    public function district()
    {
        return $this->belongsTo(district::class);
    }

    public function order()
    {
        return $this->belongsTo(order::class);
    }


    public function service()
    {
        return $this->belongsTo(service::class);
    }
}
