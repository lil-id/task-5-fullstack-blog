<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ReturnTypeWillChange;

class Post extends Model
{
    use HasFactory;

    // nama tabel yang digunakan
    protected $table = 'articles';

    // yang tidak boleh diisi oleh user
    protected $guarded = ['id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
