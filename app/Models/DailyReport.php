<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'user_id',
        'summary',
        'details',
    ];

    protected $casts = [
        'details' => 'array', // Otomatis mengubah JSON menjadi array
    ];

    /**
     * Relasi dengan user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
