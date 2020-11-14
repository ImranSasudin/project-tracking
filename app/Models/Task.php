<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'task_type', 'project_id', 'user_id', 'assigned_by', 'description', 'status'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function task()
    {
        return $this->belongsTo('App\Models\Task', 'task_type');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function user_assignBy()
    {
        return $this->belongsTo('App\Models\User', 'assigned_by');
    }
}
