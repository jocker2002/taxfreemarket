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
        Schema::create('order_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("order")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("item_id")->constrained("item")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("item_model_id")->constrained("item_model")->onUpdate("cascade")->onDelete("cascade");
            $table->unsignedSmallInteger("quantity");
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
        Schema::dropIfExists('order_item');
    }
};
