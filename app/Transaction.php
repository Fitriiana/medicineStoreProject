<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
        // memakai user id karena di database transaction ada fk user_id, untuk namanya bebas
    }

    public function buyer()
    {
        return $this->belongsTo('App\Buyer', 'buyer_id');
    }

    public function medicine()
    {
        return $this->belongsToMany('App\Medicine', 'medicine_transaction', 'transaction_id', 'medicine_id')->withPivot('quantity', 'price');
    }

    public function insertProduct($cart, $user){
        $total = 0;
        foreach ($cart as $id => $detail) {
            $total += $detail['price'] * $detail['quantity'];
            $this->medicine()->attach($id, ['quantity'=> $detail['quantity'], 'price' => $detail['price']]);
        }
        return $total;
    }
}
