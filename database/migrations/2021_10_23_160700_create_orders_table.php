<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            $table->foreign("product_id")->references("id")->on("products");
            $table->foreignId("inventory_id");
            $table->foreign("inventory_id")->references("id")->on("inventory");
            $table->text("street_address");
            $table->text("apartment");
            $table->text("city");
            $table->text("state");
            $table->string("country_code");
            $table->text("zip");
            $table->string("phone_number");
            $table->text("email");
            $table->string("name");
            $table->string("order_status");
            $table->text("payment_ref");
            $table->string("transaction_id");
            $table->integer("payment_amt_cents");
            $table->integer("ship_charged_cents")->nullable();
            $table->integer("ship_cost_cents")->nullable();
            $table->integer("subtotal_cents");
            $table->integer("total_cents");
            $table->text("shipper_name");
            $table->dateTime("payment_date");
            $table->dateTime("shipped_date");
            $table->text("tracking_number");
            $table->integer("tax_total_cents");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
