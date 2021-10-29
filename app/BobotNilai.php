<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BobotNilai extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'kode_bobot',
        'nama',
        'nilai',
    ];
}
