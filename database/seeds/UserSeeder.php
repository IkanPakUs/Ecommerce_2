<?php

use Illuminate\Database\Seeder;

use App\User;
use App\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
            $user->name = "Komang Arya";
            $user->email = "komanggede86@gmail.com";
            $user->email_verified_at = now();
            $user->password = "komang1324";
        $user->save();

        $userRole = new UserRole();
            $userRole->user_id = $user->id;
            $userRole->role_id = 1;
        $userRole->save();
    }
}
