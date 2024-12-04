<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    protected $fillable = ['nama_sumber', 'deskripsi'];

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }

    public function perusahaans()
    {
        return $this->hasMany(Perusahaan::class);
    }
}
