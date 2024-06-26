<?php

namespace Database\Seeders;

use App\Models\User;
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
        $users = array(
            [
                'name' => 'Administrator',
                'email' => 'admin@email.com',
                'password' => bcrypt('123'),
                'foto' => '/img/user.jpg',
                'level' => 1,
                'id_gerai' => 0
            ],
            [
                'name' => 'Kasir 1',
                'email' => 'kasir@email.com',
                'password' => bcrypt('123'),
                'foto' => '/img/user.jpg',
                'level' => 2,
                'id_gerai' => 1
            ]
        );

        array_map(function (array $user) {
            User::query()->updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }, $users);
    }
}
