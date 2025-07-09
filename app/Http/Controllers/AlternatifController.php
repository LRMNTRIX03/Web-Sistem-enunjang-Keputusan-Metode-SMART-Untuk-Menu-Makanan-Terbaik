<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Exception;
use App\Models\Menu;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
      $title = "Alternatif";
    $style = "css/dashboard.css";
    $data = Alternatif::orderBy('id_alternatif')->paginate(5);
    $kriteria = Kriteria::all();

    // Ambil semua menu dan grup berdasarkan alternatif
    $menu = Menu::all();
    $totalNilai = [];

    foreach ($data as $alt) {
        foreach ($kriteria as $k) {
            $nama_kriteria = strtolower($k->nama_kriteria); 
            $total = $menu->where('id_alternatif', $alt->id_alternatif)->sum($nama_kriteria);
            $totalNilai[$alt->id_alternatif][$nama_kriteria] = $total;
        }
    }

    return view('Data.Alternatif.index', compact('title', 'style', 'data', 'kriteria', 'totalNilai'));
    }

    public function create(){
        $title = "Alternatif";
        $style = "css/dashboard.css";
        return view('Data.Alternatif.create', compact(['title', 'style']));
    }



    public function store(Request $request)
    {
        try{
            $data = $request->namaAlternatif;
            if ($data != null) {
            Alternatif::create([ 
                'nama_alternatif' => $data 
            ]);
            return redirect()->route('alternatif.index')->with('success', 'Data Berhasil Ditambahkan');
        }
        }
        catch(Exception $e){
            return redirect()->route('alternatif.index')->with('error', 'Data Gagal Ditambahkan + '.$e);
        }
        
        return redirect()->route('alternatif.index')->with('error', 'Data Gagal Ditambahkan');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }
    public function detail(Alternatif $alternatif){
        $title = "Detail Alternatif";
        $style = "css/dashboard.css";
        $detailAlternatif = Menu::where('id_alternatif', $alternatif->id_alternatif)->get();
        return view('Data.Alternatif.detail', compact('alternatif', 'style', 'title', 'detailAlternatif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        $title = "Edit Alternatif";
        $style = "css/dashboard.css";
        return view('Data.Alternatif.edit', compact('alternatif', 'style', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        $data = Alternatif::find($alternatif->id);
        $validate = $request->nama;
        if ($validate !=null){
           $alternatif->update([
            'nama_alternatif' => $validate
           ]);
            
         
            return redirect()->route('alternatif.index')->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->route('alternatif.index')->with('error', 'Data Gagal Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();
        return redirect()->route('alternatif.index')->with('success', 'Data Berhasil Dihapus');

    }
}
