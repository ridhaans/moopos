<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    //Excluding the total of default data
    const TOTAL_ACCOUNT = 10;
    const TOTAL_PRODUCTS = 30;
    const TOTAL_CATEGORY = 3;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AccountSeeder::class);
    }
}
