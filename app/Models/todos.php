<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class todos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'teachers_todo';
    protected $dates = ['deleted_at'];
}
