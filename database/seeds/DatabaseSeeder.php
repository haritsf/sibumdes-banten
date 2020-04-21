<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BumdesSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(PengurusSeeder::class);
        $this->call(ModalSeeder::class);
        $this->call(HasilSeeder::class);
        $this->call(JualSeeder::class);
    }
}
