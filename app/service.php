<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public function order()
    {
        return $this->hasMany(order::class);
    }

    public function sub_order()
    {
        return $this->hasMany(sub_order::class);
    }
}
