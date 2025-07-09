<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
{
    $title = "Menu";
    $style = "css/dashboard.css";
    $alternatif = Alternatif::orderBy('id_alternatif')->get();
    $total_alternatif = $alternatif->count();

   
    if ($request->has('alternatif') && $request->alternatif != '') {
        $Menu = Menu::where('id_alternatif', $request->alternatif)
                    ->orderBy('id_alternatif')
                    ->paginate(5);
    } else {
        $Menu = Menu::orderBy('id_alternatif')->paginate(5);
    }

    $data = Kriteria::all();

    return view('Data.Menu.index', compact('title', 'style', 'Menu', 'data', 'total_alternatif', 'alternatif'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $style = "css/dashboard.css";
        $title = "Tambah Menu";
        return view('Data.Menu.create', compact(['kriteria', 'alternatif', 'style', 'title']));
    }


    public function store(Request $request)
    {
        $Kalori = $request->kalori == null ? 0 : $request->kalori;
        $Protein = $request->protein == null ? 0 : $request->protein;
        $Lemak = $request->lemak == null ? 0 : $request->lemak;
        $Karbohidrat = $request->karbohidrat == null ? 0 : $request->karbohidrat;
        // dd([$Kalori, $Protein, $Lemak, $Karbohidrat]);
        try{
        $validate = $request->validate([
            'alternatif' => 'required',
            'NamaMenu' => 'required',
        ]);
        // dd($validate);
        $data = [
            'id_alternatif' => $validate['alternatif'],
            'nama_menu' => $validate['NamaMenu'],
            'kalori' => $Kalori,
            'protein' => $Protein,
            'lemak' => $Lemak,
            'karbohidrat' => $Karbohidrat,
        ];
        // dd($data);
        if($data){
            if(DB::table('menu')->where('id_alternatif', $data['id_alternatif'])->count() == 5)
            {
                return redirect()->route('menu.create')->with('error', 'Alternatif Sudah Memiliki 5 Menu');
            }
            else{
        Menu::create([
            'id_alternatif' => $data['id_alternatif'],
            'nama_menu' => $data['nama_menu'],
            'kalori' => $data['kalori'],
            'protein' => $data['protein'],
            'lemak' => $data['lemak'],
            'karbohidrat' => $data['karbohidrat'],

        ]);
            return redirect()->route('menu.create')->with('success', 'Data Berhasil Ditambahkan');
    }
        }
        }
        catch(\Exception $e){
            return redirect()->route('menu.create')->with('error', $e->getMessage());
            print($e->getMessage());
        }
           
    }

 
    public function edit(Menu $menu)
    {
        $kriteria = Kriteria::all();
        $alternatif = Alternatif::all();
        $menu = Menu::findOrFail($menu->id_menu);
        $style = "css/dashboard.css";
        $title = "Edit Menu";
        return view('Data.Menu.edit', compact(['kriteria', 'alternatif', 'style', 'title', 'menu']));
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, Menu $menu)
{
    try {
        $validate = $request->validate([
            'alternatif' => 'required',
            'NamaMenu' => 'required',
            'kalori' => 'required|numeric',
            'protein' => 'required|numeric',
            'lemak' => 'required|numeric',
            'karbohidrat' => 'required|numeric',
        ]);

        $menu->update([
            'id_alternatif' => $validate['alternatif'],
            'nama_menu' => $validate['NamaMenu'],
            'kalori' => $validate['kalori'],
            'protein' => $validate['protein'],
            'lemak' => $validate['lemak'],
            'karbohidrat' => $validate['karbohidrat'],
        ]);

        return redirect()->route('menu.index')->with('success', 'Data Berhasil Diubah');
    } catch (Exception $e) {
        return redirect()->route('menu.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);
        return redirect()->route('menu.index')->with('success', 'Data Berhasil Dihapus');
    }
}
