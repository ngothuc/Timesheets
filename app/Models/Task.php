<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'time_spent',
        'timesheet_id',
        'completed',
    ];

    public function timesheet() {
        return $this->belongsTo(Timesheet::class);
    }

}
