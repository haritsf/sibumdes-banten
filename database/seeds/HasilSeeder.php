<?php

use Illuminate\Database\Seeder;
use App\Hasil;

class HasilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hasil::insert([
            [
                'id_bumdes' => 1,
                'untuk' => "Pemerataan Ekonomi",
                'persen' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
