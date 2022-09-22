<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;

    public const COL_QUANTITY = 'quantity';

    protected $fillable = [self::COL_QUANTITY];

    /**
     * Get the invoice that owns the invoice_detail.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * The product that belong to the invoice_detail.
     */
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
