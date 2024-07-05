<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderToFindRealeEstate extends Model
{
    public function operation()
    {
        return $this->HasOne('App\Operation','order_id');
    }
 
}
