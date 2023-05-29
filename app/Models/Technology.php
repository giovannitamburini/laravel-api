<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function projects()
    {
        // una tecnologia appartiene a più progetti
        return $this->belongsToMany(Project::class);

        // return $this->belongsToMany(Project::class);
    }
}
