<?php

use Illuminate\Database\Seeder;
use App\Jual;

class JualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jual::insert([
            [
                'id_unit' => 1,
                'produk' => "Jasa Maket",
                'foto' => null,
                'harga' => 1000000,
                'lokasi' => "Dusun Krajan",
                'telp' => "021123456789",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
