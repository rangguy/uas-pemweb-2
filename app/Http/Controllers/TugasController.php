<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();

        return view('tugas.index', ['tugas' => $tugas]);
    }

    public function create()
    {
        return view('tugas.create');
    }

    public function store(Request $request)
    {
         // validasi data
         $request->validate([
            'nama' => 'required|min:5|max:255|'
        ]);

        // masukan data request ke db table tugas dengan orm
        $tugas = new Tugas;

        $tugas->nama_tugas = $request['nama'];

        $tugas->save();

        // Alert::success('Berhasil', 'Berhasil Menambah tugas');

        // lempar ke halaman /tugas
        return redirect('/tugas');
    }

    public function edit($id)
    {
        $tugas = Tugas::find($id);
        return view('tugas.edit',compact('tugas'));
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

        $tugas = Tugas::find($id);

        $tugas->nama_tugas = $request['nama'];

        $tugas->save();
        
        // Alert::success('Berhasil', 'Berhasil Mengedit Peran');

        return redirect('/tugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tugas = Tugas::find($id);

        $tugas->delete();

        // Alert::success('Berhasil', 'Berhasil Menghapus Tasks');

        return redirect('/tugas');
    }
}
