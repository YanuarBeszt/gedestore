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
            $table->foreign('wishlist_userid')->references('userid')->on('tb_users');
            $table->string('wishlist_barangid',13);
            $table->foreign('wishlist_barang_id')->references('barang_id')->on('tb_barang');
            $table->timestamps();
        });
        
        // Schema::table('priorities', function($table) {
        //     $table->foreign('wishlist_userid')->references('userid')->on('tb_users');
        //     $table->foreign('wishlist_barang_id')->references('barang_id')->on('tb_barang');
        // });

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
