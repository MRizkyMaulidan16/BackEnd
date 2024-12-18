<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\Models\Penerbit;
class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ar_penerbit = DB::table('penerbit')->get();
        return view('penerbit.index', compact('ar_penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('penerbit')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'website' => $request->website,            
            'telp' => $request->telp
        ]);
        return redirect('/penerbit')->with('success', 'Data penerbit berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ar_penerbit = DB::table('penerbit')->where('id', $id)->get();
        return view('penerbit.show', compact('ar_penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data = DB::table('penerbit')->where('id', $id)->get();
        return view('penerbit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        DB::table('penerbit')->where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'website' => $request->website,
            'telp' => $request->telp
        ]);
        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('penerbit')->where('id', $id)->delete();
        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil dihapus');
    }
}
