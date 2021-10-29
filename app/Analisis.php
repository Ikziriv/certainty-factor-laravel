<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'kode_analisis',
        'nama',
        'palt_nomer',
        'bobot',
        'gejala_id',
    ];

    public function gejala() {
        return $this->belongsTo('App\Gejala', 'gejala_id');
    }
}
