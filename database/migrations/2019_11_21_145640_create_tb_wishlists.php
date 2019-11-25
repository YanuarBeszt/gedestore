<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbWishlists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_wishlists', function (Blueprint $table) {
            $table->Increments('wishlist_id');
            $table->Integer('wishlist_userid');
            $table->string('wishlist_barangid',13);
            $table->timestamps();
        });

        Schema::table('tb_wishlists', function($table) {
            $table->foreign('wishlist_userid')->references('tb_users')->on('idUser');
            $table->foreign('wishlist_barangid')->references('tb_barang')->on('barang_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_wishlists');
    }
}
