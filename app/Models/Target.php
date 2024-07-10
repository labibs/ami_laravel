<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Audity;
use App\Models\Indikator;

class Target extends Model
{
    use HasFactory;
    protected $table = 'target';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function audity()
    {
        return $this->belongsTo(Audity::class, 'audity_id', 'id');
    }
    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'indikator_id', 'id');
    }
}