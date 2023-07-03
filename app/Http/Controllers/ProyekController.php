<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyek = Proyek::all();

        return view('proyek.index', ['proyek' => $proyek]);
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
         // validasi data
         $request->validate([
            'nama' => 'required|min:5|max:255|'
        ]);

        // masukan data request ke db table proyek dengan orm
        $proyek = new Proyek;

        $proyek->nama_proyek = $request['nama'];

        $proyek->save();

        // Alert::success('Berhasil', 'Berhasil Menambah Proyek');

        // lempar ke halaman /proyek
        return redirect('/proyek');
    }

    public function edit($id)
    {
        $proyek = Proyek::find($id);
        return view('proyek.edit',compact('proyek'));
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

        $proyek = Proyek::find($id);

        $proyek->nama_proyek = $request['nama'];

        $proyek->save();
        
        // Alert::success('Berhasil', 'Berhasil Mengedit Peran');

        return redirect('/proyek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyek = Proyek::find($id);

        $proyek->delete();

        // Alert::success('Berhasil', 'Berhasil Menghapus Tasks');

        return redirect('/proyek');
    }
}
