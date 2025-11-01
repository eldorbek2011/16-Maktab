<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';
    protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(Schudeli::class, 'class_id', 'id');
    }
}

