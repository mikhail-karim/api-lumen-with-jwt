<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $table = 'student';
    protected $fillable = [
        'npm',
        'nama',
        'angkatan',
        'ipk',
    ];
}
