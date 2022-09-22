<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public const COL_SKU = 'sku';
    public const COL_DESCRIPTION = 'description';
    public const COL_PRICE = 'price';

    protected $fillable = [self::COL_SKU, self::COL_DESCRIPTION, self::COL_PRICE];

}
