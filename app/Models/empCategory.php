<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empCategory extends Model
{
    protected $guarded = [];
    
    public function employee() {
    return $this->hasMany(Employee::class, 'emp_category_id');
}

}
