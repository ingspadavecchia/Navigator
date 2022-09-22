<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public const COL_NUMBER = 'number';
    public const COL_STATUS = 'status';
    public const COL_AMOUNT = 'amount';
    public const COL_POSTED_AT = 'posted_at';

    public const STATUS_POSTED = 'posted';
    public const STATUS_DRAFT = 'draft';

    protected $fillable = [self::COL_NUMBER, self::COL_STATUS, self::COL_AMOUNT, self::COL_POSTED_AT];

    /**
     * Get the client that owns the invoice.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * The products that belong to the invoice.
     */
    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
