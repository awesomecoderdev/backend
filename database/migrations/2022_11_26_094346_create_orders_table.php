<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid("id");
            // $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->integer("user_id")->nullable();
            $table->text("meta")->nullable();
            $table->integer("coupon_id")->nullable();

            $table->float('amount')->nullable();
            $table->string('payment_method')->nullable();
            $table->enum("status", ["approved", "pending", "cancelled"])->default("pending");

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
};
