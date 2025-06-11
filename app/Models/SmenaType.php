<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmenaType extends Model
{
    protected $guarded = [];
    public function schedule() {
        return $this->hasMany(Schudeli::class);
    }

}
