<?php

use Illuminate\Database\Seeder;
use App\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::insert([
            [
                'id_bumdes' => 1,
                'nama' => "Sukses Makmur Berjasa",
                'jenis' => "Jasa",
                'omset' => 5000000,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
