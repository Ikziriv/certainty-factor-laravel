<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BobotNilai;

class BobotNilaiController extends Controller
{
    public function index()
    {
        $bobots = BobotNilai::all();

        return view('backend.pages.bobot.index', compact('bobots'));
    }

    public function create()
    {
        $bobot = BobotNilai::all()->last();
        if($bobot == null) {
            $init = 'BN'; $val = '1001';
            $sku_code = $init.$val;
        } else {
            $key= $bobot->kode_bobot;
            $pattern = "/(\d+)/";
            $array = preg_split($pattern, $key, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $inisial = $array[0];
            $code = $array[1] += 1;
            $sku_code = $inisial.$code;
        }

        return view('backend.pages.bobot.create', compact('sku_code'));
    }

    public function store(Request $request)
    {
        $bobot = BobotNilai::create($request->all());

        return redirect()->route('bobot.index')->with('success','Bobot berhasil ditambahkan');
    }

    public function edit(BobotNilai $bobot)
    {
        return view('backend.pages.bobot.edit', compact('bobot'));
    }

    public function update(Request $request, BobotNilai $bobot)
    {
        $bobot->update($request->all());

        return redirect()->route('bobot.index')->with('success','Bobot berhasil diubah');
    }

    public function show(BobotNilai $bobot)
    {
        return view('backend.pages.bobot.show', compact('bobot'));
    }

    public function destroy(BobotNilai $bobot)
    {
        $bobot->delete();
        return redirect()->back()->with('success','Gejala berhasil dihapus');
    }
}
