<?php

use App\TransactionStatus;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TransactionStatus::truncate();
        TransactionStatus::insert([
            ["status" => "Success"],
            ["status" => "Failed"],
            ["status" => "Pending"],
        ]);
    }
}
