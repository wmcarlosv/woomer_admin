<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigWoocommercesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_woocommerces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url',255)->nullable(false);
            $table->string('client_key',255)->nullable(false);
            $table->string('client_secret',255)->nullable(false);
            $table->string('version',10)->nullable()->default('wc/v3');
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
        Schema::dropIfExists('config_woocommerces');
    }
}
