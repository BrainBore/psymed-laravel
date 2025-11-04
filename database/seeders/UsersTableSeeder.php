<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gina',
            'email' =>'gina@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Gina12345'), // password
            'rol'=>'SuperAdmin',
        ]);
        User::factory()
            ->count(50)
            ->create();
    }
}
