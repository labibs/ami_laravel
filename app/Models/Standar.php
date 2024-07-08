<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standar extends Model
{
    use HasFactory;
    protected $table = 'standar';
    protected $guarded = ['id', 'created_at', 'updated_at'];

}