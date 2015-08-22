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
        factory(\App\Entities\User::class)->create([
            'name' => 'Deyves',
            'email' => 'deysasves@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(\App\Entities\User::class, 10)->create();
    }
}
