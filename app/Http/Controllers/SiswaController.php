<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        // Get siswas ordered by id
        $siswas = Siswa::orderBy('id')->paginate(5);
    
        // Render view with siswas
        return view('siswa.index', compact('siswas'));
    }
    
    
    /**
     * create
     *
     * @return void
     */
        public function create()
        {
            return view('siswa.create');
        }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required',
            'kelas'   => 'required'
        ]);
        //create post
        Siswa::create([
            'nama'     => $request->nama,
            'kelas'   => $request->kelas
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, Siswa $siswa)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required',
            'kelas'   => 'required'
        ]);
        //create post
        $siswa->update([
            'nama'     => $request->nama,
            'kelas'   => $request->kelas
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(Siswa $siswa) {
        $siswa->delete();

        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
}
