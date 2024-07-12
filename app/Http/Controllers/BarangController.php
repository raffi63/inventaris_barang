<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BarangController extends Controller
{

    public function __construct()
    {
        // Apply 'auth' middleware to all methods
        $this->middleware('auth');

        // Apply 'level:admin' middleware to specific methods
        $this->middleware('level:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }


    /**
     * Display a listing of the resource.
     */

     public function print(Request $request)
     {
        $query = Barang::query();

    // Apply filters based on form submission

    // Filter 1: Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Filter 2: Ruang
    if ($request->filled('ruang')) {
        $query->where('ruang', $request->ruang);
    }

    // Filter 3: Jenis Barang
    if ($request->filled('jenisbarang')) {
        $query->where('jenisbarang', $request->jenisbarang);
    }

    // Filter 4: Kondisi
    if ($request->filled('kondisi')) {
        $query->where('kondisi', $request->kondisi);
    }

    // Fetch filtered Barang records
    $barang = $query->get();

    // Retrieve distinct values for filter options
    $statuses = Barang::distinct()->pluck('status');
    $ruangs = Barang::distinct()->pluck('ruang');
    $jenisbarangs = Barang::distinct()->pluck('jenisbarang');
    $kondisis = Barang::distinct()->pluck('kondisi');

    $pdf = view('barang.print', [
        'barang' => $barang,
        'statuses' => $statuses,
        'ruangs' => $ruangs,
        'jenisbarangs' => $jenisbarangs,
        'kondisis' => $kondisis,])->render();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($pdf);
        $mpdf->Output();
        
        // dd($pdf); // This will output the object with its properties and their respective data types
        
    // Pass filtered Barang records and filter options to the view
    // return $mpdf;
    }

    public function index(Request $request)
    {
        $barang = Barang::all();

    // Retrieve distinct values for filter options
    $statuses = Barang::distinct()->pluck('status');
    $ruangs = Barang::distinct()->pluck('ruang');
    $jenisbarangs = Barang::distinct()->pluck('jenisbarang');
    $kondisis = Barang::distinct()->pluck('kondisi');

    // Pass filtered Barang records and filter options to the view
    return view('barang.index', [
        'barang' => $barang,
        'statuses' => $statuses,
        'ruangs' => $ruangs,
        'jenisbarangs' => $jenisbarangs,
        'kondisis' => $kondisis,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:barang,id',
            'namabarang' => 'required',
            'deskripsi' => 'required',
            'serialnumber' => 'required',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlahbarang' => 'required|integer|min:1',
            'satuan' => 'required|in:unit,pcs,set',
            'kondisi' => 'required|in:baik,kurangbaik,rusak',
            'keterangan' => 'required',
            'jenisbarang' => 'required|in:laptop,storage,server,desktop,monitor,telekomunikasi,handphone,aksesoris,perangkatjaringan,elektronik',
            'ruang' => 'required|in:1,18,site',
            'status' => 'required|in:ready,keluar,rusak,stay,dalamperbaikan,hilang'
        ]);

        $barang = Barang::create($request->all());

        return redirect()->route('barang.index')->with('success_message', 'Berhasil menambah barang baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $barang = Barang::find($id);
        $barang = Barang::with('barangkeluar')->find($id);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error_message', 'Barang dengan id ' . $id . ' tidak ditemukan');
        }

        return view('barang.show', ['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error_message', 'Barang dengan id ' . $id . ' tidak ditemukan');
        }

        return view('barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'namabarang' => 'required',
            'deskripsi' => 'required',
            'serialnumber' => 'required',
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'jumlahbarang' => 'required|integer|min:1',
            'satuan' => 'required|in:unit,pcs,set',
            'kondisi' => 'required|in:baik,kurangbaik,rusak',
            'keterangan' => 'required',
            'jenisbarang' => 'required|in:laptop,storage,server,desktop,monitor,telekomunikasi,handphone,aksesoris,perangkatjaringan,elektronik',
            'ruang' => 'required|in:1,18,site',
            'status' => 'required|in:ready,keluar,rusak,stay,dalamperbaikan,hilang'
        ]);

        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error_message', 'Barang dengan id ' . $id . ' tidak ditemukan');
        }

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success_message', 'Berhasil mengubah barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->route('barang.index')->with('error_message', 'Barang dengan id ' . $id . ' tidak ditemukan');
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success_message', 'Berhasil menghapus barang');
    }
}
