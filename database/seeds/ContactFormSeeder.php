<?php

use Illuminate\Database\Seeder;
use App\Models\Bbs;
class ContactFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bbs::class, 200)->create();
    }
}
