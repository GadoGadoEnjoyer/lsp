<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    protected $table = "buku";
    protected $fillable = ['kode','judul','pengarang','penerbit','tahun','dipinjam'];
    public function transaksi(): HasMany
    {
        return $this->hasMany(Transaksi::class);
    }
}
