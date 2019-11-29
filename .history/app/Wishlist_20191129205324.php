<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    
    protected $table="tb_wishlists";
    protected $primaryKey = 'wishlist_id';
    // protected $foreignKey = 'wishlist_barangid','wishlist_userid';
    protected $fillable = ['wishlist_userid','wishlist_barangid'];
}
