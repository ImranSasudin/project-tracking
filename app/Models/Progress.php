<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';
    
    protected $fillable = [
        'checklist_id', 'project_id', 'updated_by', 'status'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }

    public function checklist()
    {
        return $this->belongsTo('App\Models\Checklist', 'checklist_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function user_updatedBy()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }
}
