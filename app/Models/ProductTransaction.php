<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'user_id',
        'storage_location_id',
        'quantity',
        'transaction_type',
    ];

    /**
     * Relasi dengan produk.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relasi dengan pemasok.
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Relasi dengan user (admin, super admin, atau user).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan lokasi penyimpanan.
     */
    public function storageLocation()
    {
        return $this->belongsTo(StorageLocation::class);
    }
}
