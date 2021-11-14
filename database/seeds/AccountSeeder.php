<?php

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = new Account();
        $account->name = "Pengusaha Sukses";
        $account->store_name = 'Toko Sukses';
        $account->email = 'sukses@gmail.com';
        $account->password = Hash::make(123123); // password
        $account->remember_token = Str::random(10);
        $account->role = 2;
        $account->save();
        $factoryAccount = factory(Account::class, DatabaseSeeder::TOTAL_ACCOUNT)->create();
    }
}
