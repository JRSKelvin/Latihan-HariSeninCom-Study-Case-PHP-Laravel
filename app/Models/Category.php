<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Category';
    protected $fillable = [
        'category_name',
        'category_slug',
        'asset_id',
    ];
}