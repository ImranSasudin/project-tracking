<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    use HasFactory;

    protected $table = 'task_type';

    protected $fillable = [
        'name'
    ];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'task_type');
    }
}
