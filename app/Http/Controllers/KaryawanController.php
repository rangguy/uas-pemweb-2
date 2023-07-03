<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Karyawan;
use App\Models\Proyek;
use App\Models\Tugas;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $proyek = Proyek::all();
        $tugas = Tugas::all();
        $departemen = Departemen::all();
        return view('karyawan.index', compact('karyawan'), compact('proyek'), compact('tugas'), compact('departemen'));
    }

    public function create()
    {
        $proyek = Proyek::all();
        $tugas = Tugas::all();
        $departemen = Departemen::all();
        return view('karyawan.create', compact('proyek', 'departemen', 'tugas'));
    }

    public function store(Request $request)
    {
         // validasi data
         $request->validate([
            'nama' => 'required|min:5|max:255|'
        ]);

        // masukan data request ke db table karyawan dengan orm
        $karyawan = new Karyawan;

        $karyawan->nama_karyawan = $request['nama'];
        $karyawan->proyek_id = $request['proyek_id'];
        $karyawan->tugas_id = $request['tugas_id'];
        $karyawan->departemen_id = $request['departemen_id'];

        $karyawan->save();

        // Alert::success('Berhasil', 'Berhasil Menambah karyawan');

        // lempar ke halaman /karyawan
        return redirect('/karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        $proyek = Proyek::all();
        $tugas = Tugas::all();
        $departemen = Departemen::all();
        return view('karyawan.edit', compact('karyawan','proyek', 'departemen', 'tugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:5|max:255|',
        ]);

        $karyawan = Karyawan::find($id);

        $karyawan->nama_karyawan = $request['nama'];
        $karyawan->proyek_id = $request->proyek_id;
        $karyawan->tugas_id = $request->tugas_id;
        $karyawan->departemen_id = $request->departemen_id;

        $karyawan->save();
        
        // Alert::success('Berhasil', 'Berhasil Mengedit Peran');

        return redirect('/karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        $karyawan->delete();

        // Alert::success('Berhasil', 'Berhasil Menghapus Karyawan');

        return redirect('/karyawan');
    }
}
