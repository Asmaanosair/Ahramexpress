<?php

namespace App\Imports;

use App\order;
use Maatwebsite\Excel\Concerns\ToModel;

class Importorder implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new order([
            //
        ]);
    }
}
