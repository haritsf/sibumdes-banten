<?php

use Illuminate\Database\Seeder;
use App\Modal;

class ModalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modal::insert([
            [
                'id_bumdes' => 1,
                'sumber' => "Iuran Bersama",
                'bentuk' => "Uang",
                'jumlah' => 1000000,
                'tahun' => 2019,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
