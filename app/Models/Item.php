<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = ['item_name', 'item_description', 'item_num', 'item_price', 'item_pic'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
