<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Definisikan nama tabel jika tidak mengikuti konvensi penamaan tabel
    protected $table = 'notifications';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'message',
        'is_read',
        'is_deleted',
    ];

    // Setiap notifikasi bisa memiliki banyak informasi terkait seperti user yang menerima (opsional)
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Accessor untuk status "dibaca" (menampilkan teks status)
    public function getStatusAttribute()
    {
        return $this->is_read ? 'Sudah dibaca' : 'Belum dibaca';
    }

    // Accessor untuk status "dihapus" (menampilkan teks status)
    public function getDeletionStatusAttribute()
    {
        return $this->is_deleted ? 'Dihapus' : 'Aktif';
    }

    // Mutator untuk memastikan 'is_read' dan 'is_deleted' diset sebagai boolean
    protected $casts = [
        'is_read' => 'boolean',
        'is_deleted' => 'boolean',
    ];

    // Menambahkan timestamp otomatis
    public $timestamps = true;
}
