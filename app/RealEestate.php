<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealEestate extends Model
{
    public function operation()
    {
        return $this->HasOne('App\Operation','reale_estate_id');
    }
}
