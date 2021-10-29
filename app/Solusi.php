<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'kode_solusi',
        'nama',
        // 'nilai',
    ];

    public function gesol() {
        return $this->hasMany('App\GejalaSolusi', 'id');
    }
}
