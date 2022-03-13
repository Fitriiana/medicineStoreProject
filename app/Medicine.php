<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //dari table medicine bisa melihat kategori sesuai kolom category_id
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
