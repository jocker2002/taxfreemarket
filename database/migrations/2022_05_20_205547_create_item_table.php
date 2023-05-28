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
        Schema::create("item", function (Blueprint $table) {
            $table->id();
            $table->string("item_api_id", 30)->unique();
            $table->char("type", 1)->nullable();
            $table->string("brand")->nullable();
            $table->char("currency", 3)->nullable();
            $table->string("name")->nullable();
            $table->string("code")->nullable();
            $table->string("intra", 20)->nullable();
            $table->string("madein")->nullable();
            $table->boolean("intangible")->nullable();
            $table->boolean("online")->nullable();
            $table->decimal("bestTaxable", $precision = 10, $scale = 2)->nullable();
            $table->decimal("streetPrice", $precision = 10, $scale = 2)->nullable();
            $table->decimal("suggestedPrice", $precision = 10, $scale = 2)->nullable();
            $table->decimal("taxable", $precision = 10, $scale = 2)->nullable();
            $table->float("weight", 5, 2)->nullable();
            $table->smallInteger("availability")->nullable();
            $table->string("catalogRuleId")->nullable();
            $table->string("lastUpdate")->nullable();
            $table->string("noVariation")->nullable();
            $table->string("item_id", 20)->unique();
            $table->decimal("sellPrice", $precision = 10, $scale = 2)->nullable();
            $table->string("ruleId")->nullable();
            $table->string("createdAt")->nullable();
            $table->timestamps();
        });

        Schema::create("item_picture", function (Blueprint $table) {
            $table->id();
            
            $table->string("item_api_id")
                ->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");;

            $table->string("url")->nullable();
            $table->boolean("blob")->nullable();
            $table->string("picture_id")->nullable();
        });

        /*
        Schema::table("item_picture", function (Blueprint $table) {
            $table->foreign("item_api_id")->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");
        });
        */

        Schema::create("item_description", function (Blueprint $table) {
            $table->id();

            $table->string("item_api_id")
                ->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");

            $table->text("description")->nullable();
            $table->string("localecode", 10)->nullable();
        });

        /*
        Schema::table("item_description", function (Blueprint $table) {
            $table->foreign("item_api_id")->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");
        });
        */

        Schema::create("item_model", function (Blueprint $table) {
            $table->id();

            $table->string("item_api_id")
                ->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");
                
            $table->text("attributes")->nullable();
            $table->text("descriptions")->nullable();
            $table->smallInteger("availability")->nullable();
            $table->decimal("bestTaxable", $precision = 10, $scale = 2)->nullable();
            $table->decimal("streetPrice", $precision = 10, $scale = 2)->nullable();
            $table->decimal("suggestedPrice", $precision = 10, $scale = 2)->nullable();
            $table->decimal("taxable", $precision = 10, $scale = 2)->nullable();
            $table->string("model")->nullable();
            $table->boolean("backorder")->nullable();
            $table->string("code")->nullable();
            $table->string("size")->nullable();
            $table->string("color")->nullable();
            $table->string("barcode")->nullable();
            $table->string("lastUpdate")->nullable();
            $table->string("lastTimeZero")->nullable();
            $table->string("model_id", 20)->unique();;
            $table->decimal("sellPrice", $precision = 10, $scale = 2)->nullable();
            $table->string("ruleId")->nullable();
        });

        /*
        Schema::table("item_model", function (Blueprint $table) {
            $table->foreign("item_api_id")->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");
        });
        */

        Schema::create("item_tag", function (Blueprint $table) {
            $table->id();

            $table->string("item_api_id")
                ->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");

            $table->boolean("hidden")->nullable();;
            $table->char("priority", 1)->nullable();
            $table->string("name")->nullable();
            $table->string("value")->nullable();
            $table->string("tag_id")->nullable();
        });

        /*
        Schema::table("item_tag", function (Blueprint $table) {
            $table->foreign("item_api_id")->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");
        });
        */

        Schema::create("item_tag_translation", function (Blueprint $table) {
            $table->id();
            $table->string("item_api_id")

                ->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");

            $table->string("tag_id")->nullable();
            $table->string("localecode", 10)->nullable();
            $table->string("value")->nullable();
        });

        /*
        Schema::table("item_tag_translation", function (Blueprint $table) {
            $table->foreign("tag_id")->references("tag_id")->on("item_tag")
                ->onDelete("set null")->onUpdate("cascade");
        });
        */
        
        Schema::create("item_tag_value_translation", function (Blueprint $table) {
            $table->id();

            $table->string("item_api_id")
                ->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");

            $table->string("tag_id")->nullable();
            $table->string("localecode", 10)->nullable();
            $table->string("value")->nullable();
        });

        /*
        Schema::table("item_tag_value_translation", function (Blueprint $table) {
            $table->foreign("tag_id")->references("tag_id")->on("item_tag")
                ->onDelete("set null")->onUpdate("cascade");
        });
        */

        Schema::create("item_attribute", function (Blueprint $table) {
            $table->id();

            $table->string("item_api_id")
                ->references("item_api_id")->on("item")
                ->onDelete("set null")->onUpdate("cascade");
                
            $table->string("name")->nullable();
            $table->string("value")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("item");
        Schema::dropIfExists("item_picture");
        Schema::dropIfExists("item_description");
        Schema::dropIfExists("item_model");
        Schema::dropIfExists("item_tag");
        Schema::dropIfExists("item_tag_translation");
        Schema::dropIfExists("item_tag_value_translation");
        Schema::dropIfExists("item_attribute");
    }
};
