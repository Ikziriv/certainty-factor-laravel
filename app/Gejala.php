<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'kode_gejala',
        'nama',
        // 'nilai',
    ];

    public function gesol() {
        return $this->hasMany('App\GejalaSolusi', 'id');
    }
}
