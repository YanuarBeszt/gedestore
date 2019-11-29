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
            $table->Increments('wishlist_id')->unsigned();
            $table->Integer('wishlist_userid');
            $table->foreign('wishlist_userid')->references('tb_users')->on('idUser');
            $table->string('wishlist_barangid',13);
            $table->foreign('wishlist_barang_id')->references('tb_barang')->on('barang_id');
            $table->timestamps();
        });
        
        Schema::table('priorities', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
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
