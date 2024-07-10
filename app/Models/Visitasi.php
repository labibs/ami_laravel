<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitasi extends Model
{
    use HasFactory;
    protected $table = 'visitasi';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function siklus()
    {
        return $this->belongsTo(Siklus::class, 'siklus_id', 'id');
    }
    public function akun()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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
    public function pengukuran()
    {
        return $this->belongsTo(Pengukuran::class, 'pengukuran_id', 'id');
    }
}