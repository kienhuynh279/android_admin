<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable =
    [
         'tenkhachhang',
         'sodienthoai',
        'email'
    ];
}
