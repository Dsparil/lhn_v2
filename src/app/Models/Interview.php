<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $connection = 'mariadb';

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
