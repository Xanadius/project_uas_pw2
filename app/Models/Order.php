<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->HasOne('App\Models\User', 'id', 'user_id');
    }

    public function product()
    {
        return $this->HasOne('App\Models\Product', 'id', 'product_id');
    }
}
