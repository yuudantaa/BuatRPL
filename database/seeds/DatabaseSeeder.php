<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
{
    User::create([
        'name' => 'Nama Pengguna',
        'email' => 'email@domain.com',
        'password' => bcrypt('password'), // Pastikan menggunakan bcrypt untuk password
    ]);
}
}
