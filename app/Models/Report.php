<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

>>>>>>> main
    protected $fillable = [
        'subject',
        'body',
        'contact',
<<<<<<< HEAD
        'image_url',
        'is_done',
        'created_at'
    ];
=======
        'image_url'
    ];

>>>>>>> main
}
