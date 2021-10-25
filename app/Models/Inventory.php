<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    public static function withProductName($userID)
    {
        //Product Name, sku, quantity, color, size, price and cost
        return DB::select(
            DB::raw("select p.product_name, p.id, i.sku, i.quantity, i.color, i.size, i.price_cents, i.cost_cents from inventory i inner join products p on i.product_id = p.id where p.user_id = :user"),
            [
                "user" => $userID
            ]
        );
    }
}
