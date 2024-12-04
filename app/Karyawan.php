<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan'; // Tabel di database
    protected $primaryKey = 'id';  // Primary key

    protected $fillable = [
        'nama',
        'nama_bank',
        'no_rekening',
        'status',
        'department',
        'joining_date',
        'perusahaan_id',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
    public function sumberDana()
{
    return $this->belongsTo(SumberDana::class);
}

}


