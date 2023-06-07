<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'body'];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
