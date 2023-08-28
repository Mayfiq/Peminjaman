<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];

        public function kategori()
        {
            return $this->belongsTo(kategori::class);
    
        }
}