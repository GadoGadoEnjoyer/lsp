<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = ['buku','siswa','pinjam','kembali'];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku', 'id'); 
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'siswa', 'id');
    }
    public $timestamps = false;
}
