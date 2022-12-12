<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'user_id' => '1',
            'title' => 'ini title',
            'slug' => 'ini-title',
            'status' => 'publish',
            'summary' => 'ini summary ya',
            'body' => 'dan ini body nya'
        ]);
    }
}
