<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorychildren extends Model
{
    protected $guarded = [];
    // CategoryChildren.php
public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

}
