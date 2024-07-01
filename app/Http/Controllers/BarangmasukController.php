<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $barangmasuk = Barangmasuk::all();
        return view('barangmasuk.index', [
            'barangmasuk' => $barangmasuk,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nextId = Barangmasuk::count() + 100001;
        $barangKeluarList = Barangkeluar::all();

        return view('barangmasuk.create', [
            'barangKeluarList' => $barangKeluarList,
            'nextId' => $nextId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules for BarangMasuk
        $request->validate([
            'id' => 'required|unique:barangmasuk,id',
            'idkeluar' => 'required|exists:barangkeluar,id',
            'jumlahmasuk' => 'required|integer|min:1',
            'statusmasuk' => 'required|in:ready',
            'tanggal' => 'required|date',
        ]);

        $barangmasuk = Barangmasuk::create($request->all());

        return redirect()->route('barangmasuk.index')->with('success_message', 'Berhasil menambah data barang masuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barangmasuk = Barangmasuk::find($id);

        if (!$barangmasuk) {
            return redirect()->route('barangmasuk.index')->with('error_message', 'Data barang masuk dengan id ' . $id . ' tidak ditemukan');
        }

        return view('barangmasuk.show', ['barangmasuk' => $barangmasuk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangmasuk = Barangmasuk::find($id);
        $barangKeluarList = Barangkeluar::all();

        if (!$barangmasuk) {
            return redirect()->route('barangmasuk.index')->with('error_message', 'Data barang masuk dengan id ' . $id . ' tidak ditemukan');
        }

        return view('barangmasuk.edit', [
            'barangmasuk' => $barangmasuk,
            'barangKeluarList' => $barangKeluarList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation rules for updating BarangMasuk
        $request->validate([
            'idkeluar' => 'required|exists:barangkeluar,id',
            'jumlahmasuk' => 'required|integer|min:1',
            'statusmasuk' => 'required|in:ready',
            'tanggal' => 'required|date',
        ]);

        $barangmasuk = Barangmasuk::find($id);

        if (!$barangmasuk) {
            return redirect()->route('barangmasuk.index')->with('error_message', 'Data barang masuk dengan id ' . $id . ' tidak ditemukan');
        }

        $barangmasuk->update($request->all());

        return redirect()->route('barangmasuk.index')->with('success_message', 'Berhasil mengubah data barang masuk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangmasuk = Barangmasuk::find($id);

        if (!$barangmasuk) {
            return redirect()->route('barangmasuk.index')->with('error_message', 'Data barang masuk dengan id ' . $id . ' tidak ditemukan');
        }

        $barangmasuk->delete();

        return redirect()->route('barangmasuk.index')->with('success_message', 'Berhasil menghapus data barang masuk');
    }
}
