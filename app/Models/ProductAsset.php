<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAsset extends Model
{
    use HasFactory;
    protected $table = 'ProductAsset';
    protected $fillable = [
        'asset_id',
        'product_id',
    ];
}
