<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solusi;

class SolusiController extends Controller
{
    public function index()
    {
        $solusis = Solusi::all();

        return view('backend.pages.solusi.index', compact('solusis'));
    }

    public function create()
    {
        $solusi= Solusi::all()->last();
        if($solusi== null) {
            $init = 'SLS'; $val = '1001';
            $sku_code = $init.$val;
        } else {
            $key= $solusi->kode_solusi;
            $pattern = "/(\d+)/";
            $array = preg_split($pattern, $key, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
            $inisial = $array[0];
            $code = $array[1] += 1;
            $sku_code = $inisial.$code;
        }

        return view('backend.pages.solusi.create', compact('sku_code'));
    }

    public function store(Request $request)
    {
        $solusi= Solusi::create($request->all());

        return redirect()->route('solusi.index')->with('success','Solusi berhasil ditambahkan');
    }

    public function edit(Solusi $solusi)
    {

        return view('backend.pages.solusi.edit', compact('solusi'));
    }

    public function update(Request $request, Solusi $solusi)
    {
        $solusi->update($request->all());

        return redirect()->route('solusi.index')->with('success','Solusi berhasil diubah');
    }

    public function show(Solusi $solusi)
    {

        return view('backend.pages.solusi.show', compact('solusi'));
    }

    public function destroy(Solusi $solusi)
    {
        $solusi->delete();
        return redirect()->back()->with('success','Solusi berhasil dihapus');
    }
}
