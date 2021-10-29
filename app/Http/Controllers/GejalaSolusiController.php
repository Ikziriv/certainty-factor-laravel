<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GejalaSolusi;
use App\Gejala;
use App\Solusi;

class GejalaSolusiController extends Controller
{
    public function index()
    {
        $perbaikans = GejalaSolusi::all();
        return view('backend.pages.gejala_solusi.index', compact('perbaikans'));
    }

    public function create()
    {
        $gejala = Gejala::select('id', 'kode_gejala', 'nama')->get();
        $solusi = Solusi::select('id', 'kode_solusi', 'nama')->get();

        return view('backend.pages.gejala_solusi.create', compact('gejala', 'solusi'));
    }

    public function store(Request $request)
    {
        $perbaikan= GejalaSolusi::create($request->all());

        return redirect()->back()->with('success','Perbaikan berhasil ditambahkan');
    }

    public function edit(GejalaSolusi $perbaikan)
    {

        return view('backend.pages.gejala_solusi.edit', compact('perbaikan'));
    }

    public function update(Request $request, GejalaSolusi $perbaikan)
    {
        $perbaikan->update($request->all());

        return redirect()->route('perbaikan.index')->with('success','Perbaikan berhasil diubah');
    }

    public function show(GejalaSolusi $perbaikan)
    {

        return view('backend.pages.gejala_solusi.show', compact('perbaikan'));
    }

    public function destroy(GejalaSolusi $perbaikan)
    {
        $perbaikan->delete();
        return redirect()->back()->with('success','Perbaikan berhasil dihapus');
    }
}
