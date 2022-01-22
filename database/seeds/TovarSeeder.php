<?php

use Illuminate\Database\Seeder;

class TovarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Tovar', 10)->create();
    }
}
