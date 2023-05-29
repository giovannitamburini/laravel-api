<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'type_id', 'technology_id', 'cover_image'];

    // ogni project avrà una sola categoria (category al singolare)
    public function type()
    {
        // questo progetto appartiene a Type::class
        return $this->belongsTo(Type::class);
    }

    public function technologies()
    {
        // un progetto appartiene a più tecnologie
        return $this->belongsToMany(Technology::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
