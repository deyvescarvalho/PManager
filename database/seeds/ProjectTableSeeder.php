<?php
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Entities\Client::truncate();
        factory(\App\Entities\Project::class, 10)->create();
    }
}
