<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    // protected $table="wishlists";
    protected $primaryKey = 'wishlist_id';
    protected $foreignKey = 'barang_id';
    protected $fillable = ['user_id','product_id'];
}
