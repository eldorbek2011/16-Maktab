<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];
    // App\Models\Lesson.php
    public function schudelis()
    {
        return $this->hasMany(Schudeli::class, 'lesson_id', 'id');
    }

}
