<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengukuran extends Model
{
    use HasFactory;
    protected $table = 'pengukuran';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['siklus_id', 'audity_id', 'standard_id', 'tahun','target_id', 'indikator_id', 'pengukuran', 'active'];

    public function siklus()
    {
        return $this->belongsTo(Siklus::class, 'siklus_id', 'id');
    }
    public function audity()
    {
        return $this->belongsTo(Audity::class, 'audity_id', 'id');
    }
    public function standar()
    {
        return $this->belongsTo(Standar::class, 'standar_id', 'id');
    }
    public function indikator()
    {
        return $this->belongsTo(Indikator::class, 'indikator_id', 'id');
    }
    public function target()
    {
        return $this->belongsTo(Target::class, 'target_id', 'id');
    }
}