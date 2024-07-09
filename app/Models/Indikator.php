<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Standar;

class Indikator extends Model
{
    use HasFactory;
    protected $table = 'indikator';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function standar()
    {
        return $this->belongsTo(Standar::class, 'standard_id', 'id');
    }
}