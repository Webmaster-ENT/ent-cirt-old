<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'body',
        'contact',
        'image_url',
        'is_done',
        'created_at'
    ];
}
