<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Logbarang;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Log;



class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    
        // Pass filtered Barang records and filter options to the view
        return view('tes', [
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
    public function view_pdf(Request $request)
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

        // Pass filtered Barang records and filter options to the view
        $html = view('tes', [
            'barang' => $barang,
            'statuses' => $statuses,
            'ruangs' => $ruangs,
            'jenisbarangs' => $jenisbarangs,
            'kondisis' => $kondisis,
        ])->render();
            // Create mPDF instance
        $mpdf = new \Mpdf\Mpdf();

        // Write the HTML content to mPDF
        $mpdf->WriteHTML($html);
        
        // Output the PDF
        $mpdf->Output();
    
}

    

    public function download_pdf(Request $request)
    {
        $b = Barang::all();
        $bk = Barangkeluar::all();
        $bm = Barangmasuk::all();
        $lb = Logbarang::all();
        $p = Pegawai::all();
        $jp = Pegawai::count();
        $statuses = Barang::distinct()->pluck('status');
        $ruangs = Barang::distinct()->pluck('ruang');
        $jenisbarangs = Barang::distinct()->pluck('jenisbarang');
        $kondisis = Barang::distinct()->pluck('kondisi');
        Log::info('Barang:', $b->toArray());
        Log::info('Request:', $request->all());
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('tes', ['barang' => $b, 'barangkeluar' => $bk, 'barangmasuk' => $bm, 'logbarang' => $lb, 'pegawai' => $p, 'jp' => $jp, 'statuses' => $statuses, 'ruangs' => $ruangs, 'jenisbarangs' => $jenisbarangs, 'kondisis' => $kondisis]));
        $mpdf->Output('laporan.pdf', 'D');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
