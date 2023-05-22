<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/users.json");
        $data = json_decode($json);
        foreach($data as $user){
            User::create(array(                
                "name" => $user->name,
                "email" => $user->email,
                "email_verified_at" => $user->email_verified_at,
                "password" => Hash::make($user->password),
                "is_admin" => $user->is_admin
            ));
        }
    }
}
