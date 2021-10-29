<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;
use App\Kriteria;
use App\Nilai;

function cariCF($gejala_id){
    $sql = "SELECT nilai_cf FROM relasi WHERE id_gejala = '$gejala_id'";
    $res = getOneRow($sql);
    
    return $res['nilai_cf'];
}
