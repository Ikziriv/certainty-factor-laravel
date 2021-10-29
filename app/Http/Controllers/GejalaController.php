<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();

        return view('backend.pages.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        $gejala= Gejala::all()->last();
        if($gejala== null) {
            $init = 'GJL'; $val = '1001';
            $sku_code = $init.$val;
        } else {
            $key= $gejala->kode_gejala;
            $pattern = "/(\d+)/";
            $array = preg_split($pattern, $key, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $inisial = $array[0];
            $code = $array[1] += 1;
            $sku_code = $inisial.$code;
        }

        return view('backend.pages.gejala.create', compact('sku_code'));
    }

    public function store(Request $request)
    {
        $gejala= Gejala::create($request->all());

        return redirect()->route('gejala.index')->with('success','Gejala berhasil ditambahkan');
    }

    public function edit(Gejala $gejala)
    {

        return view('backend.pages.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        $gejala->update($request->all());

        return redirect()->route('gejala.index')->with('success','Gejala berhasil diubah');
    }

    public function show(Gejala $gejala)
    {

        return view('backend.pages.gejala.show', compact('gejala'));
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect()->back()->with('success','Gejala berhasil dihapus');
    }
}
