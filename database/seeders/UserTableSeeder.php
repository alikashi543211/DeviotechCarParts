<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('role', 'admin')->count() == 0) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@carparts.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ]);
        }
    }
}
