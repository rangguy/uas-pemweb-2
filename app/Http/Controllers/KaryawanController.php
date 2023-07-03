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
        return view('karyawan.create', compact('proyek'), compact('tugas'), compact('departemen'));
    }

    public function store(Request $request)
    {
         // validasi data
         $request->validate([
            'nama' => 'required|min:5|max:255|',
            'id_proyek' => 'required',
            'id_tugas' => 'required',
            'id_departemen' => 'required'
        ]);

        // masukan data request ke db table karyawan dengan orm
        $karyawan = new Karyawan;

        $karyawan->nama_karyawan = $request['nama'];
        $karyawan->proyek_id = $request['id_proyek'];
        $karyawan->tugas_id = $request['id_tugas'];
        $karyawan->departemen_id = $request['id_departemen'];

        $karyawan->save();

        // Alert::success('Berhasil', 'Berhasil Menambah karyawan');

        // lempar ke halaman /karyawan
        return redirect('/karyawan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        return view('karyawan.edit',compact('karyawan'));
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
            'nama' => 'required|min:5|max:255|'
        ]);

        $karyawan = Karyawan::find($id);

        $karyawan->nama_karyawan = $request['nama'];
        $karyawan->proyek_id = $request['id_proyek'];
        $karyawan->tugas_id = $request['id_tugas'];
        $karyawan->departemen_id = $request['id_departemen'];

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
        $proyek = Karyawan::find($id);

        $proyek->delete();

        // Alert::success('Berhasil', 'Berhasil Menghapus Tasks');

        return redirect('/proyek');
    }
}
