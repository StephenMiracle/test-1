<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Order;

class PopulateContent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->runUserSeeder();
        //$this->runProductSeeder();
        //$this->runInventorySeeder();
        $this->runOrdersSeeder();
    }


    private function runProductSeeder()
    {
        $row = 1;
        $headersRow = [];
        if (($handle = fopen(getcwd() . "/database/seeders/products.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                $row++;

                if ($row === 2) {
                    foreach ($data as $id => $val) {
                        if (in_array($val, ["id", "product_name","description","style","brand","url","product_type","shipping_price","note","admin_id"])) {
                            $headersRow[$val] = $id;
                        }
                    }
                } else {
                    $coldata = [];
    
                    foreach($headersRow as $col => $loc) {
                        $coldata[$col] = $data[$loc];
                    }
    
                    Product::create($coldata);
                }

            }
            fclose($handle);
        }
    }


    private function runInventorySeeder()
    {
        $row = 1;
        $headersRow = [];
        if (($handle = fopen(getcwd() . "/database/seeders/inventory.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                $row++;

                if ($row === 2) {
                    foreach ($data as $id => $val) {
                        if (in_array($val, ["id", "product_id", "quantity","color","size","weight","price_cents","sale_price_cents","cost_cents","sku","length","width","height","note"])) {
                            $headersRow[$val] = $id;
                        }
                    }
                } else {
                    $coldata = [];
    
                    foreach($headersRow as $col => $loc) {
                        $coldata[$col] = $data[$loc];
                    }
    
                    Inventory::create($coldata);
                }

            }
            fclose($handle);
        }
    }


    private function runOrdersSeeder()
    {
        $row = 1;
        $headersRow = [];
        if (($handle = fopen(getcwd() . "/database/seeders/orders.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                $row++;

                if ($row === 2) {
                    foreach ($data as $id => $val) {
                        if (in_array($val, ["id", "product_id","inventory_id","street_address","apartment","city","state","country_code","zip","phone_number","email","name","order_status","payment_ref","transaction_id","payment_amt_cents","ship_charged_cents","ship_cost_cents","subtotal_cents","total_cents","shipper_name","payment_date","shipped_date","tracking_number","tax_total_cents"])) {
                            $headersRow[$val] = $id;
                        }
                    }
                } else {
                    $coldata = [];
    
                    foreach($headersRow as $col => $loc) {
                        $coldata[$col] = $data[$loc];
                    }
    
                    Order::create($coldata);
                }

            }
            fclose($handle);
        }
    }

    private function runUserSeeder()
    {
        $row = 1;
        $headersRow = [];
        if (($handle = fopen(getcwd() . "/database/seeders/users.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                $row++;

                if ($row === 2) {
                    foreach ($data as $id => $val) {
                        if (in_array($val, ["id", "name", "email", "superadmin", "shop_name", "card_brand", "card_last_four", "trial_ends_at", "shop_domain", "is_enabled", "billing_plan", "trial_starts_at"])) {
                            $headersRow[$val] = $id;
                        } elseif ($val === "password_plain") {
                            $headersRow["password"] = $id;
                        }
                    }
                    continue;
                } else {
                    $userData = [];
    
                    foreach($headersRow as $col => $loc) {
                        if ($col === "password") {
                            $userData[$col] = bcrypt($data[$loc]);
                        } else {
                            $userData[$col] = $data[$loc];
                        }
                    }
    
                    User::create($userData);
                }

            }
            fclose($handle);
        }
    }
}
