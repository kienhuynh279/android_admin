<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable =
    [
        'product_name',
        'product_price',
        'product_image',
        'product_description',
        'product_id',
        'create_at',
        'update_at'
    ];

    public function Category()
    {
        return $this->hasMany('App\Models\Category','id', 'id');
    }
}
