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
         $this->call(UsersTableSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(ContactFormSeeder::class);
         $this->call(Bbs_CategorySeeder::class);
    }
}
