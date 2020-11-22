<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'file_path', 'file_name',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

}
