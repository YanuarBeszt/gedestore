<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    //
    protected $table="tb_wishlists";
    protected $primaryKey = 'wishlist_id';
    protected $foreignKey = 'wishlist_barangId','wishlist_userId';
    // protected $fillable = ['wishlist_userId','wishlist_barangId'];
}
