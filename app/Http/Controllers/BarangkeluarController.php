<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangkeluar = Barangkeluar::all();
        return view('barangkeluar.index', [
            'barangKeluar' => $barangkeluar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nextId = Barangkeluar::count() + 100001;
        $barangList = Barang::all();
        $pegawaiList = Pegawai::all();

        return view('barangkeluar.create', [
            'barangList' => $barangList,
            'pegawaiList' => $pegawaiList,
            'nextId' => $nextId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for BarangKeluar
        $request->validate([
            'id' => 'required|unique:barangkeluar,id',
            'idbarang' => 'required|exists:barang,id',
            'idpegawai' => 'required|exists:pegawai,id',
            'statuskeluar' => 'required|in:keluar,ready',
            'jumlahkeluar' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $barangkeluar = Barangkeluar::create($request->all());

        return redirect()->route('barangkeluar.index')->with('success_message', 'Berhasil menambah data barang keluar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangkeluar = Barangkeluar::find($id);

        if (!$barangkeluar) {
            return redirect()->route('barangkeluar.index')->with('error_message', 'Data barang keluar dengan id ' . $id . ' tidak ditemukan');
        }

        return view('barangkeluar.show', ['barangkeluar' => $barangkeluar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangkeluar = Barangkeluar::find($id);
        $barangList = Barang::all();
        $pegawaiList = Pegawai::all();

        if (!$barangkeluar) {
            return redirect()->route('barangkeluar.index')->with('error_message', 'Data barang keluar dengan id ' . $id . ' tidak ditemukan');
        }

        return view('barangkeluar.edit', [
            'barangkeluar' => $barangkeluar,
            'barangList' => $barangList,
            'pegawaiList' => $pegawaiList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation rules for updating BarangKeluar
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'idpegawai' => 'required|exists:pegawai,id',
            'statuskeluar' => 'required|in:keluar,ready',
            'jumlahkeluar' => 'required|integer|min:1',
            'tanggal' => 'required|date',
        ]);

        $barangkeluar = Barangkeluar::find($id);

        if (!$barangkeluar) {
            return redirect()->route('barangkeluar.index')->with('error_message', 'Data barang keluar dengan id ' . $id . ' tidak ditemukan');
        }

        $barangkeluar->update($request->all());

        return redirect()->route('barangkeluar.index')->with('success_message', 'Berhasil mengubah data barang keluar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangkeluar = Barangkeluar::find($id);

        if (!$barangkeluar) {
            return redirect()->route('barangkeluar.index')->with('error_message', 'Data barang keluar dengan id ' . $id . ' tidak ditemukan');
        }

        $barangkeluar->delete();

        return redirect()->route('barangkeluar.index')->with('success_message', 'Berhasil menghapus data barang keluar');
    }
}
