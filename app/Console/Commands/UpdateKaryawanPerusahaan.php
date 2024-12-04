<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateKaryawanPerusahaan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
{
    $karyawan = Karyawan::find(1); // ID karyawan yang ingin diupdate
    $karyawan->perusahaan_id = 1; // Misalkan perusahaan dengan ID 1
    $karyawan->save();

    $this->info('Karyawan berhasil diupdate!');
}

}
