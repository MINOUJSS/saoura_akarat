<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function operation()
    {
        return $this->hasOne('App\Operation');
    }
}
