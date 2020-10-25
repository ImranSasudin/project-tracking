<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'date', 'client_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'client_id');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\TaskAssigned', 'project_id');
    }

    public function progress()
    {
        return $this->hasMany('App\Models\Progress', 'project_id');
    }
}
