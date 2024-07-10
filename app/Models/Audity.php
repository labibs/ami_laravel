<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fakultas;

class Audity extends Model
{
    use HasFactory;
    protected $table = 'audity';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'institusi_id', 'id');
    }
}