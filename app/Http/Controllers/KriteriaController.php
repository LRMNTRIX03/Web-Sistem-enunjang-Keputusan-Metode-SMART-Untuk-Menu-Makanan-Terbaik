<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Kriteria Bobot";
        $data = Kriteria::orderBy('id_kriteria')->paginate(10);
        $style = "css/dashboard.css";
        return view('Data.Bobot_Kriteria.index', compact(['title', 'data', 'style']));
    }
    public function create()
    {
        $title = "Data Kriteria Bobot";
        $style = "css/dashboard.css";
        return view('Data.Bobot_Kriteria.create', compact(['title', 'style']));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'Kriteria' => 'required',
            'Bobot' => 'required|max_digits:2',
            'attribute' => 'required'
        ]);
       
        Kriteria::create([
            'nama_kriteria' => strtolower($data['Kriteria']),
            'bobot' => strtolower($data['Bobot']),
            'attribut' => strtolower($data['attribute'])
        ]);
        return redirect()->route('kriteria.create')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit(Kriteria $kriteria){
        $data = Kriteria::findOrFail($kriteria->id_kriteria);
        $title = "Data Kriteria Bobot";
        $style = "css/dashboard.css";
        return view('Data.Bobot_Kriteria.update', compact(['title', 'data', 'style']));
    }

   
    public function update(Request $request, Kriteria $kriteria)
    {
        $data = $request->validate([
            'Kriteria' => 'required',
            'Bobot' => 'required|max_digits:2',
            'attribute' => 'required'
        ]);

        Kriteria::where('id_kriteria', $kriteria->id_kriteria)->update([
            'nama_kriteria' => strtolower($data['Kriteria']),
            'bobot' => strtolower($data['Bobot']),
            'attribut' => strtolower($data['attribute'])
        ]);
        return redirect()->route('kriteria.index')->with('success', 'Data Berhasil Diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();
        return redirect()->route('kriteria.index')->with('success', 'Data Berhasil Dihapus');
        //
    }

}
