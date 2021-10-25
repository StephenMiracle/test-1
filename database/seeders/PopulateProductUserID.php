<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;

class PopulateProductUserID extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        foreach ($products as $prod) {
            $prod->user_id = rand(25, 35);
            $prod->save();
        }
    }
}
