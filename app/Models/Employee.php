<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];
    public function position() {
        return $this->belongsTo(Position::class);
    }
    public function category() {
        return $this->belongsTo(empCategory::class);
    }
    public function schudel() {
        return $this->belongsTo(Schudeli::class);
    }
    public function education()
{
    return $this->belongsTo(Education::class);
}

}
