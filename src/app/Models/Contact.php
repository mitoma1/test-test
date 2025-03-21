<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
<<<<<<< HEAD
        'last_name',
        'first_name',
        'gender',
        'email',
        'phone',
        'address',
        'building',
        'category',
        'message',
=======
        'name',
        'company',
        'email',
        'tel',
        'content'
>>>>>>> a6eab46c3a2501eaeeadcf98623c369db7079aa3
    ];
}
