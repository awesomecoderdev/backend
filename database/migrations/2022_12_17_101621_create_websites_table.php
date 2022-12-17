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
        Schema::create('websites', function (Blueprint $table) {
            $table->uuid("id");
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->text("title")->nullable();
            $table->string("url")->nullable();
            $table->string("rest")->nullable();
            $table->enum("status", ["approved", "pending", "blocked"])->default("pending");
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
        Schema::dropIfExists('websites');
    }
};
