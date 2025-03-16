<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $fillable = [
        'id',
        'name',
        'slug',
        'country',
        'address',
        'email',
        'genre',
        'discography',
        'lineup',
        'website',
    ];
}
