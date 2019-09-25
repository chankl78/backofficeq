<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance_m_Attendance extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'attendancedate',
        'attendancetime',
        'description',
        'createbyname',
    ];
}
