<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }

    public function Order()
    {
        return $this->belongsTo('App\OrderToFindRealeEstate','order_id');
    }

    public function Reale_Estate()
    {
        return $this->belongsTo('App\RealEestate','reale_estate_id');
    }
}
