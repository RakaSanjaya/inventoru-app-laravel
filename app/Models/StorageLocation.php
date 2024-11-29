<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi dengan transaksi produk.
     */
    public function transactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }

    // StorageLocation model
    public function products()
    {
        return $this->hasMany(Product::class, 'storage_location_id');  // Menghubungkan lokasi penyimpanan ke produk
    }
}
