<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //fake data
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'name' => 'Admin'
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'username' => 'user',
                'password' => bcrypt('user'),
                'name' => 'User'
            ]
        ];

        foreach ($users as $user) {
            //insert data
            DB::table('users')->insert($user);
        }
        //fake data Role
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Admin'
            ],
            [
                'name' => 'user',
                'description' => 'User'
            ]
        ];
        foreach ($roles as $role) {
            //insert data
            DB::table('roles')->insert($role);
        }
        //fake data Role User
        $role_user = [
            [
                'user_id' => 1,
                'role_id' => 1
            ],
            [
                'user_id' => 2,
                'role_id' => 2
            ]
        ];
        foreach ($role_user as $role_user) {
            DB::table('role_user')->insert($role_user);
        }

    }
}
