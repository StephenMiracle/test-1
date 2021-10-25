<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    public static function withProductInfo($userID)
    {
        //customer name, email address, product name, color, size, order_status, order total, transaction id, shipper (if applicable), tracking number (if applicable)
        return DB::select(
            DB::raw("select c.product_id, c.name, c.email, c.order_status, c.total_cents, c.transaction_id, c.shipper_name, c.tracking_number, p.product_name, p.id, i.color, i.size from orders c inner join products p on c.product_id = p.id inner join inventory i on c.inventory_id = i.id where p.user_id = :user"),
            [
                "user" => $userID
            ]
        );
    }
}
