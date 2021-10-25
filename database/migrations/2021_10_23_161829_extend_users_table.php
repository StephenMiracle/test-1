<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean("superadmin");
            $table->string("shop_name");
            $table->string("card_brand");
            $table->string("card_last_four");
            $table->dateTime("trial_ends_at");
            $table->string("shop_domain");
            $table->boolean("is_enabled");
            $table->string("billing_plan");
            $table->dateTime("trial_starts_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
