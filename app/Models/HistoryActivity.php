<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'actor',
        'name_product',
        'activity_type',
        'quantity_change',
        'description',
    ];

    public function getActivityTypeClass(): string
    {
        $activityClasses = [
            'stock_in'  => 'bg-green-100 text-green-800',
            'stock_out' => 'bg-red-100 text-red-800',
            'added'     => 'bg-blue-100 text-blue-800',
            'removed'   => 'bg-red-100 text-gray-800',
            'updated'   => 'bg-yellow-100 text-yellow-800',
        ];

        return $activityClasses[$this->activity_type] ?? 'bg-white text-black';
    }
}
