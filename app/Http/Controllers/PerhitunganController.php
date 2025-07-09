<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use Illuminate\Http\Request;
use App\Models\Alternatif;
use Exception;
use App\Models\DetailPerhitungan;
use App\Models\Kriteria;
use App\Models\Menu;
use Barryvdh\DomPDF\Facade\Pdf;
use function Termwind\parse;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        $title = "Perhitungan";
        $style = "css/dashboard.css";
        $perhitungan = Perhitungan::paginate(5);
        return view('Data.Matrix.index', compact('title', 'style', 'perhitungan', 'alternatif'));

    }


    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'AwalAlternatif' => 'required',
            'AkhirAlternatif' => 'required',
        ]);

       
        if ($validated['AwalAlternatif'] == $validated['AkhirAlternatif']) {
            return redirect()->route('perhitungan.index')->with('error', 'Data tidak boleh sama.');
        }
        else{

        $awal = (int) filter_var($validated['AwalAlternatif'], FILTER_SANITIZE_NUMBER_INT);
        $akhir = (int) filter_var($validated['AkhirAlternatif'], FILTER_SANITIZE_NUMBER_INT);
        // dd($awal, $akhir);

        // Hitung selisih
        $selisih = abs($awal - $akhir);
        // dd($selisih);

        if ($selisih == 9 && $selisih!=0) {
            Perhitungan::create([
            'awal_alternatif' => $validated['AwalAlternatif'],
            'akhir_alternatif' => $validated['AkhirAlternatif'],
        ]);
          return redirect()->route('perhitungan.index')->with('success', 'Data berhasil disimpan!');
           
        }
        else{
           return redirect()->route('perhitungan.index')->with('error', 'Selisih antara alternatif tidak boleh lebih dari 10 atau kurang dari 10.');
        }
        }
    } catch (\Exception $e) {
        return redirect()->route('perhitungan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function destroy(Perhitungan $perhitungan)
    {
        Perhitungan::destroy($perhitungan->id_perhitungan);
        return redirect()->route('perhitungan.index')->with('success', 'Data Berhasil Dihapus');
    }       
public function proses($id)
{
    $perhitungan = Perhitungan::findOrFail($id);

    
    $alternatif = Alternatif::whereBetween('id_alternatif', [$perhitungan->awal_alternatif, $perhitungan->akhir_alternatif])->get();

    
    $kriteria = Kriteria::all();

    
    $dataAlternatif = [];
    foreach ($alternatif as $alt) {
        $menus = Menu::where('id_alternatif', $alt->id_alternatif)->get();

      
        $total = [
            'kalori' => $menus->sum('kalori'),
            'protein' => $menus->sum('protein'),
            'lemak' => $menus->sum('lemak'),
            'karbohidrat' => $menus->sum('karbohidrat'),
        ];

        $dataAlternatif[] = [
            'id_alternatif' => $alt->id_alternatif,
            'nama_alternatif' => $alt->nama_alternatif,
            'kalori' => $total['kalori'],
            'protein' => $total['protein'],
            'lemak' => $total['lemak'],
            'karbohidrat' => $total['karbohidrat'],
        ];
    }

    
    $normal = [];
    foreach (['kalori', 'protein', 'lemak', 'karbohidrat'] as $key) {
        $values = array_column($dataAlternatif, $key);
        // dd($dataAlternatif);
        $max = max($values);
        $min = min($values);
 
       
     
        $tipe = $kriteria->first(function ($item) use ($key) {
    return strtolower($item->nama_kriteria) === strtolower($key);
})?->attribut ?? 'benefit';
    //            $minMaxData[$key] = [
    //     'kriteria' => $key,
    // 'tipe' => $tipe,
    // 'min' => $min,
    // 'max' => $max,
    // ];

        foreach ($dataAlternatif as $index => $alt) {
            $val = $alt[$key];
            $normal[$index][$key] = $tipe === 'benefit'
                ? ($max > 0 ? ($val / $max) * 0.1  : 0)
                : ($val > 0 ? ($min / $val) *  0.1  : 0);
        }
    }
  
    // dd($minMaxData);

 
    $bobot = [];
    foreach ($kriteria as $k) {
        $bobot[$k->nama_kriteria] = $k->bobot;
    }
    // dd($bobot);
    // dd($normal);
    foreach ($dataAlternatif as $i => $alt) {
        $nilai_akhir = (
        ($normal[$i]['kalori'] ?? 0) * ($bobot['kalori']/100 ?? 0) +
        ($normal[$i]['protein'] ?? 0) * ($bobot['protein']/100 ?? 0) +
        ($normal[$i]['lemak'] ?? 0) * ($bobot['lemak']/100 ?? 0) +
        ($normal[$i]['karbohidrat'] ?? 0) * ($bobot['karbohidrat']/100 ?? 0)
    );
    // dd($nilai_akhir);


        
        DetailPerhitungan::updateOrCreate(
            [
                'id_perhitungan' => $id,
                'id_alternatif' => $alt['id_alternatif']
            ],
            [
                'kalori' => $normal[$i]['kalori'],
                'protein' => $normal[$i]['protein'],
                'lemak' => $normal[$i]['lemak'],
                'karbohidrat' => $normal[$i]['karbohidrat'],
                'nilai_akhir' => $nilai_akhir,
            ]
        );
    }

    return redirect()->route('perhitungan.hasil', $id)->with('success', 'Perhitungan berhasil diproses.');
}



public function hasil($id)
{
    $title = "Hasil Perhitungan";
    $style = "css/dashboard.css";
    $hasil = DetailPerhitungan::where('id_perhitungan', $id)
        // ->orderByDesc('nilai_akhir')
        ->with('alternatif') 
        ->get();

    return view('Data.Matrix.hasil', compact('hasil', 'title', 'style'));
}
public function exportPdf($id)
{
    $hasil = DetailPerhitungan::where('id_perhitungan', $id)
        ->with('alternatif') 
        ->get();

    $pdf = Pdf::loadView('Data.Matrix.exportPDF', compact('hasil'));
    return $pdf->download('hasil_perhitungan.pdf');
}



}
