<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::paginate(10);

        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datasiswa = Siswa::all();

        return view('pembayaran.create', compact('datasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function show($id)
     {
         $pageTitle = 'Detail';
 
         $data = Pembayaran::where('id_siswa', $id)->orderBy('tgl_bayar', 'desc')->paginate(5);
 
         return view('pembayaran.detail', compact('pageTitle', 'data'));
     }
 
    public function store(Request $request)
    {
        
        $request->validate([
            'id_siswa' => 'required',
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required|numeric'
        ]);

        $existingRecord = Pembayaran::where('id_siswa', $request->id_siswa)->first();

        if($existingRecord) {
            $data = [
                'id_siswa' => $request->id_siswa,
                'tgl_bayar' => $request->tgl_bayar,
                'jumlah_bayar' => $existingRecord->jumlah_bayar + $request->jumlah_bayar
            ];
    
            $existingRecord->update($data);
    
            return redirect()->route('pembayaran.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            $data = [
                'id_siswa' => $request->id_siswa,
                'tgl_bayar' => $request->tgl_bayar,
                'jumlah_bayar' => $request->jumlah_bayar
            ];
    
            Pembayaran::create($data);

            return redirect()->route('pembayaran.index')->with('success', 'Berhasil Menambahkan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'id_siswa' => 'required',
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required|numeric'
        ]);

        $nominalsebelumnya = $pembayaran->jumlah_bayar;

        $nominalbaru = $nominalsebelumnya + $request->jumlah_bayar;

        $data = [
            'id_siswa' => $request->id_siswa,
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah_bayar' => $nominalbaru
        ];

        $pembayaran->update($data);

        return redirect()->route('pembayaran.index')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with(['success' => 'Data berhasil dihapus']);
    }
}