<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'administrator',
            'email' => 'admin@csirt.je',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'administrator',
            'email' => 'yudha@csirt.je',
            'password' => bcrypt('yudha'),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
    }
}
