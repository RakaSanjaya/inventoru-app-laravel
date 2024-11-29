<?php

namespace App\Models;

use App\Http\Controllers\ProductLocationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'sku',
        'stock',
        'storage_location_id',
        'price',
        'description',
    ];

    /**
     * Relasi dengan kategori.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function storageLocation()  // Nama fungsi harus konsisten dengan relasi
    {
        return $this->belongsTo(StorageLocation::class, 'storage_location_id'); // Memastikan relasi mengarah pada 'storage_location_id'
    }

    /**
     * Relasi dengan transaksi produk.
     */
    public function transactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }
}
