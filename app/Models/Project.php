<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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

    public function countProgress()
    {
        $percentage = DB::table('checklists')
                ->join('progress', 'checklists.id', '=', 'progress.checklist_id')
                ->where('progress.project_id', $this->id)
                ->sum('checklists.percentage');
                
        return $percentage;
    }

    public function formattedDate()
    {
        return Carbon::parse($this->date)->format('d F, Y');
    }
}
