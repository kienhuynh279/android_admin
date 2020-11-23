<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'chitietdonhang';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable =
    [
         'madonhang',
         'masanpham',
        'tensanpham',
        'giasanpham',
        'soluongsanpham'
    ];

    public function Product()
    {
        return $this->belongsTo('App\Models\Product','id', 'id');
    }

    public function Cart()
    {
        return $this->belongsTo('App\Models\Cart','id', 'id');
    }
}
