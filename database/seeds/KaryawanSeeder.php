<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use App\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        // Misalnya karyawan dengan ID 1
        $karyawan = Karyawan::find(1);
        if ($karyawan) {
            $karyawan->perusahaan_id = 1; // Set perusahaan_id ke 1
            $karyawan->save();
        }

        // Menambahkan karyawan baru
        Karyawan::create([
            'nama' => 'John Doe',
            'no_rekening' => '123456789',
            'nama_bank' => 'Bank ABC',
            'status' => 'Aktif',
            'department' => 'HR',
            'joining_date' => '2022-01-01',
            'perusahaan_id' => 1, // Set perusahaan_id untuk karyawan baru
        ]);
    }
}
