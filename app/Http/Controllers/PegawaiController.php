<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', [
            'pegawai' => $pegawai
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namapegawai' => 'required',
            'nip' => 'required|unique:pegawai,nip',
            'jabatan' => 'required|in:ceo,director,securityanalyst,reporting,ssm,hr,financeaccounting,operational,salesmarketing',
            'divisi' => 'required|in:all,tehnikal,training,finance,hr,operational',
        ]);

        $pegawai = Pegawai::create($request->all());

        return redirect()->route('pegawai.index')->with('success_message', 'Berhasil menambah pegawai baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->route('pegawai.index')->with('error_message', 'Pegawai dengan id ' . $id . ' tidak ditemukan');
        }

        return view('pegawai.show', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->route('pegawai.index')->with('error_message', 'Pegawai dengan id ' . $id . ' tidak ditemukan');
        }

        return view('pegawai.edit', ['pegawai' => $pegawai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namapegawai' => 'required',
            'nip' => 'required|unique:pegawai,nip,' . $id,
            'jabatan' => 'required|in:ceo,director,securityanalyst,reporting,ssm,hr,financeaccounting,operational,salesmarketing',
            'divisi' => 'required|in:all,tehnikal,training,finance,hr,operational',
        ]);

        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->route('pegawai.index')->with('error_message', 'Pegawai dengan id ' . $id . ' tidak ditemukan');
        }

        $pegawai->update($request->all());

        return redirect()->route('pegawai.index')->with('success_message', 'Berhasil mengubah pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::find($id);

        if (!$pegawai) {
            return redirect()->route('pegawai.index')->with('error_message', 'Pegawai dengan id ' . $id . ' tidak ditemukan');
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success_message', 'Berhasil menghapus pegawai');
    }
}
