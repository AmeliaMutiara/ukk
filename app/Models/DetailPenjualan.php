<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPenjualan extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'updated_at',
        'created_at'
    ];
    public function produk() {
        return $this->belongsTo(Produk::class);
    }
    
}
