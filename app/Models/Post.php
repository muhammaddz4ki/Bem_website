<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Melindungi agar 'id' tidak bisa diisi manual
    protected $guarded = ['id'];

    /**
     * Relasi: Satu Berita (Post) dimiliki oleh satu Kategori (Category)
     */
    public function category()
    {
        // 'belongsTo' artinya 'dimiliki oleh'
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi: Satu Berita (Post) dimiliki oleh satu Penulis (User)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
