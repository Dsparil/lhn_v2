<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function fanzine()
    {
        return $this->hasOne(Fanzine::class);
    }

    public function livereport()
    {
        return $this->hasOne(Livereport::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function interview()
    {
        return $this->hasOne(Interview::class);
    }

    public function band()
    {
        return $this->hasOne(Band::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function createdBy()
    {
        return $this->hasOne(User::class);
    }

    public function updatedBy()
    {
        return $this->hasOne(User::class);
    }
}
