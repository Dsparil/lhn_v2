<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $connection = 'mariadb';

    protected $fillable = [
        'id',
        'name',
        'code',
    ];

    public $timestamps = false;
}
