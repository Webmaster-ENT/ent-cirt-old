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
            'name' => 'admin-exdec',
            'email' => 'exdec@csirt.je',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'name' => 'admin-yudha',
            'email' => 'yudha@csirt.je',
            'password' => bcrypt('yudha'),
        ]);
    }
}
