<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
