<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'activity_type',
        'quantity_change',
        'description',
    ];

    /**
     * Relasi dengan User (Admin).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getActivityTypeClass()
    {
        switch ($this->activity_type) {
            case 'stock_in':
                return 'bg-green-100 text-green-800'; // Warna untuk stock in
            case 'stock_out':
                return 'bg-red-100 text-red-800'; // Warna untuk stock out
            case 'added':
                return 'bg-blue-100 text-blue-800'; // Warna untuk penambahan produk
            case 'removed':
                return 'bg-gray-100 text-gray-800'; // Warna untuk penghapusan produk
            case 'updated':
                return 'bg-yellow-100 text-yellow-800'; // Warna untuk pembaruan produk
            default:
                return 'bg-white text-black'; // Warna default jika tipe tidak terdefinisi
        }
    }
}
