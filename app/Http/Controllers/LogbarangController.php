<?php

namespace App\Http\Controllers;

use App\Models\Logbarang;
use App\Models\Barang;
use Illuminate\Http\Request;

class LogbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logbarang = Logbarang::all();
        return view('logbarang.index', [
            'logbarang' => $logbarang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangList = Barang::all();

        return view('logbarang.create', [
            'barangList' => $barangList,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for Logbarang
        $request->validate([
            'id' => 'required|unique:logbarang,id',
            'idbarang' => 'required|exists:barang,id',
            'statuslama' => 'required|in:ready,keluar,rusak,stay,dalamperbaikan,gantibaru,kembali,belumkembali,hilang,kembalikurang',
            'statusbaru' => 'required|in:ready,keluar,rusak,stay,dalamperbaikan,gantibaru,kembali,belumkembali,hilang,kembalikurang',
        ]);

        $logbarang = Logbarang::create($request->all());

        return redirect()->route('logbarang.index')->with('success_message', 'Berhasil menambah data log barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logbarang = Logbarang::find($id);

        if (!$logbarang) {
            return redirect()->route('logbarang.index')->with('error_message', 'Data log barang dengan id ' . $id . ' tidak ditemukan');
        }

        return view('logbarang.show', ['logbarang' => $logbarang]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $logbarang = Logbarang::find($id);
        $barangList = Barang::all();

        if (!$logbarang) {
            return redirect()->route('logbarang.index')->with('error_message', 'Data log barang dengan id ' . $id . ' tidak ditemukan');
        }

        return view('logbarang.edit', [
            'logbarang' => $logbarang,
            'barangList' => $barangList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation rules for updating Logbarang
        $request->validate([
            'idbarang' => 'required|exists:barang,id',
            'statuslama' => 'required|in:ready,keluar,rusak,stay,dalamperbaikan,gantibaru,kembali,belumkembali,hilang,kembalikurang',
            'statusbaru' => 'required|in:ready,keluar,rusak,stay,dalamperbaikan,gantibaru,kembali,belumkembali,hilang,kembalikurang',
        ]);

        $logbarang = Logbarang::find($id);

        if (!$logbarang) {
            return redirect()->route('logbarang.index')->with('error_message', 'Data log barang dengan id ' . $id . ' tidak ditemukan');
        }

        $logbarang->update($request->all());

        return redirect()->route('logbarang.index')->with('success_message', 'Berhasil mengubah data log barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logbarang = Logbarang::find($id);

        if (!$logbarang) {
            return redirect()->route('logbarang.index')->with('error_message', 'Data log barang dengan id ' . $id . ' tidak ditemukan');
        }

        $logbarang->delete();

        return redirect()->route('logbarang.index')->with('success_message', 'Berhasil menghapus data log barang');
    }
}
