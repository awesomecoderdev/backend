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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable();
            $table->text("meta")->nullable();
            $table->string("name")->nullable();
            $table->text("description")->nullable();
            $table->enum("type", ["percentage", "fixed"])->default("percentage");
            $table->integer("value")->nullable();
            $table->enum("status", ["active", "inactive", "expired"])->default("inactive");
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
        Schema::dropIfExists('coupons');
    }
};
