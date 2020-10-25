<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'description', 'percentage'
    ];

    public function progress()
    {
        return $this->hasMany('App\Models\Progress', 'checklist_id');
    }
}
