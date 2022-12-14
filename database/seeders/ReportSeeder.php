<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            'subject' => 'report one',
            'body' => 'wifi error mas, masa iya engga dibenerin'
        ]);
        Report::create([
            'subject' => 'report two',
            'body' => 'wifi sudah bisa mas, tapi lambat',
            'is_done' => true
        ]);
    }
}
