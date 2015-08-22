<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Entities\Client::truncate();
        factory(\App\Entities\User::class, 10)->create();
    }
}
