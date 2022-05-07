<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'buyer_id', 'id');
        // buyer_id afalah fk, id adalah pk 
    }
}
