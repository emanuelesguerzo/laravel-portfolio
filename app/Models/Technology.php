<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $hidden = ['pivot', 'created_at', 'updated_at'];
    
    public function projects() {
        return $this->belongsToMany(Project::class);
    }
}
