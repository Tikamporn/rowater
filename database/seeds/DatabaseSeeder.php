<?php

use Illuminate\Database\Seeder;
use App\Customer;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::truncate();
        User::truncate();
        factory(App\Customer::class,20)->create();
        factory(App\User::class,20)->create();
    }
}
