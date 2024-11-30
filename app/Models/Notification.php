<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'message',
        'is_read',
        'is_deleted',
    ];

    public function getStatusAttribute(): string
    {
        return $this->is_read ? 'Sudah dibaca' : 'Belum dibaca';
    }

    public function getDeletionStatusAttribute(): string
    {
        return $this->is_deleted ? 'Dihapus' : 'Aktif';
    }

    protected $casts = [
        'is_read' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    public $timestamps = true;
}
