<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = Departemen::all();

        return view('departemen.index', ['departemen' => $departemen]);
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
         // validasi data
         $request->validate([
            'nama' => 'required|min:5|max:255|'
        ]);

        // masukan data request ke db table proyek dengan orm
        $departemen = new Departemen;

        $departemen->nama_departemen = $request['nama'];

        $departemen->save();

        // Alert::success('Berhasil', 'Berhasil Menambah departemen');

        // lempar ke halaman /departemen
        return redirect('/departemen');
    }

    public function edit($id)
    {
        $departemen = Departemen::find($id);
        return view('departemen.edit',compact('departemen'));
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

        $departemen = Departemen::find($id);

        $departemen->nama_departemen = $request['nama'];

        $departemen->save();
        
        // Alert::success('Berhasil', 'Berhasil Mengedit Peran');

        return redirect('/departemen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departemen = Departemen::find($id);

        $departemen->delete();

        // Alert::success('Berhasil', 'Berhasil Menghapus Tasks');

        return redirect('/departemen');
    }
}
