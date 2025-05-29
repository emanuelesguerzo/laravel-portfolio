<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    
    public function projects() {
        return $this->hasMany(Project::class);
    }
}
