<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('goodsouts', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('device_id')->nullable()->unsigned();
           $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('set null');
           $table->string('date');
           $table->integer('location_id')->nullable()->unsigned();
           $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('set null');
           $table->integer('receiver_id')->nullable()->unsigned();
           $table->foreign('receiver_id')->references('id')->on('receivers')->onUpdate('cascade')->onDelete('set null');
           $table->integer('users_id')->nullable()->unsigned();
           $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
           $table->integer('category_id')->nullable()->unsigned();
           $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
           $table->timestamps();
           $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goodsouts');
    }
}
