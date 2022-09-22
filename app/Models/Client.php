<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public const COL_NAME = 'name';
    public const COL_EMAIL = 'email';
    public const COL_ADDRESS = 'address';

    protected $fillable = [self::COL_NAME, self::COL_EMAIL, self::COL_ADDRESS];

    /**
     * Get the invoices for the Client.
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

}
