<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug'];

    // ogni type avrà più progetti (project al plurale)
    public function projects()
    {
        // letteralmente: un tipo "ha molti" progetti
        return $this->hasMany(Project::class);
    }
}
