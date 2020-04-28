<?php

namespace App\Exports;

use App\order;
use Maatwebsite\Excel\Concerns\FromCollection;

class exportorder implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return order::all();
    }
}
