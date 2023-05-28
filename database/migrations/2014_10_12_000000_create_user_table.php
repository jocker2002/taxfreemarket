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
        Schema::create("user", function (Blueprint $table) {
            $table->id();
            $table->string("username");
            $table->string("first_name", 50);
            $table->string("last_name", 50);
            $table->string("middle_name", 50)->nullable();
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->string("password");
            $table->string("phone", 23)->nullable();
            $table->unsignedTinyInteger("country_id")->nullable();
            $table->string("city")->nullable();
            $table->string("region")->nullable();
            $table->string("street_address")->nullable();
            $table->string("street_address_2")->nullable();
            $table->string("zip_code", 15)->nullable();
            $table->unsignedTinyInteger("language_id")->nullable();
            $table->unsignedTinyInteger("currency_id")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        /*
        Schema::table("user", function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('country')
                ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('language_id')->references('id')->on('language')
                ->onDelete('set null')->onUpdate('cascade');

            $table->foreign('currency_id')->references('id')->on('currency')
                ->onDelete('set null')->onUpdate('cascade');
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("user");
    }
};
