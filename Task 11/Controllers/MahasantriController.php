<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_mahasantri = DB::table('mahasantri')
        ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
        ->join('matakuliah', 'matakuliah.id', '=', 'dosen.matakuliah_id')
        ->select('mahasantri.*', 'dosen.nama AS dosen', 'jurusan.nama AS jurusan', 'matakuliah.nama AS matkul')	
        ->get();
        return view('mahasantri.index', compact('ar_mahasantri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $ar_dosen = DB::table('dosen')->get();
        $ar_jurusan = DB::table('jurusan')->get();
        $ar_matakuliah = DB::table('matakuliah')->get();
        return view('mahasantri.create', compact('ar_dosen', 'ar_jurusan', 'ar_matakuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('mahasantri')->insert([
            'nama' => $request->nama,
            'nim' => $request->nim,           
            'jurusan_id' => $request->jurusan_id,
            'dosen_id' => $request->dosen_id, 
        ]);
        return redirect('/mahasantri')->with('success', 'Data mahasantri berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ar_mahasantri = DB::table('mahasantri')
        ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
        ->join('matakuliah', 'matakuliah.id', '=', 'dosen.matakuliah_id')
        ->select('mahasantri.*', 'dosen.nama AS dosen', 'jurusan.nama AS jurusan', 'matakuliah.nama AS matkul')
        ->where('mahasantri.id', $id)->get();           
        return view('mahasantri.show', compact('ar_mahasantri'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = DB::table('mahasantri')->where('id', $id)->get();
        return view('mahasantri.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('mahasantri')->where('id', $id)->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'dosen_id' => $request->dosen_id,
            'jurusan_id' => $request->jurusan_id,
        ]);
        return redirect('/mahasantri')->with('success', 'Data mahasantri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('mahasantri')->where('id', $id)->delete();
        return redirect('/mahasantri')->with('success', 'Data mahasantri berhasil dihapus');
    }
}
