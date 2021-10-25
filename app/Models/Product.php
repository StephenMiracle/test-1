<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public function skus()
    {
        return $this->inventory()->select(["id", "sku"]);
    }
}
