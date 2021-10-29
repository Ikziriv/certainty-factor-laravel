<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GejalaSolusi extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'gejala_id',
        'solusi_id',
        'nilai',
    ];

    public function gejala() {
        return $this->belongsTo('App\Gejala', 'gejala_id');
    }

    public function solusi() {
        return $this->belongsTo('App\Solusi', 'solusi_id');
    }
}
