<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schudeli extends Model
{
    protected $guarded = [];
    // Schudeli.php model
    public function smena() {
        return $this->belongsTo(SmenaType::class, 'smena_id', 'id');
    }
    public function lesson() {
        return $this->belongsTo(Lesson::class, 'lesson_id', 'id');
    }
   // App\Models\Schudeli.php
public function employee()
{
    return $this->belongsTo(Employee::class);
}





}
