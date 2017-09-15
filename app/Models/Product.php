<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable,SoftDeletes;


    protected $table = "products";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


}
