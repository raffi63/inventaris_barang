<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jp = Pegawai::where('status', 'active')->count();

        // Total Barang
        $tb = DB::table('barang')->sum('jumlahbarang');

        // Total Barang Ready
        $tbr = DB::table('barang')->where('status', 'ready')->sum('jumlahbarang');

        // Total Barang Baik
        $tbb = DB::table('barang')->where('kondisi', 'baik')->sum('jumlahbarang');

        // Total Barang Kurang Baik
        $tbkb = DB::table('barang')->where('kondisi', 'kurangbaik')->sum('jumlahbarang');

        // Total Barang Rusak
        $tbru = DB::table('barang')->where('kondisi', 'rusak')->sum('jumlahbarang');

        // Total Barang Laptop
        $tbl = DB::table('barang')->where('jenisbarang', 'laptop')->sum('jumlahbarang');

        // Total Barang Handphone
        $tbh = DB::table('barang')->where('jenisbarang', 'handphone')->sum('jumlahbarang');

        // Total Barang Laptop Ready
        $tblr = DB::table('barang')->where('jenisbarang', 'laptop')->where('status', 'ready')->sum('jumlahbarang');

        // Total Barang Handphone Ready
        $tbhr = DB::table('barang')->where('jenisbarang', 'handphone')->where('status', 'ready')->sum('jumlahbarang');

        // Total Barang Baik (Laptop)
        $tbbLaptop = DB::table('barang')
            ->where('kondisi', 'baik')
            ->where('jenisbarang', 'laptop')
            ->sum('jumlahbarang');

        // Total Barang Kurang Baik (Laptop)
        $tbkblaptop = DB::table('barang')
            ->where('kondisi', 'kurangbaik')
            ->where('jenisbarang', 'laptop')
            ->sum('jumlahbarang');

        // Total Barang Rusak (Laptop)
        $tbruLaptop = DB::table('barang')
            ->where('kondisi', 'rusak')
            ->where('jenisbarang', 'laptop')
            ->sum('jumlahbarang');

        // Total Barang Baik (Handphone)
        $tbbHandphone = DB::table('barang')
            ->where('kondisi', 'baik')
            ->where('jenisbarang', 'handphone')
            ->sum('jumlahbarang');

        // Total Barang Kurang Baik (Handphone)
        $tbkbHandphone = DB::table('barang')
            ->where('kondisi', 'kurangbaik')
            ->where('jenisbarang', 'handphone')
            ->sum('jumlahbarang');

        // Total Barang Rusak (Handphone)
        $tbruHandphone = DB::table('barang')
            ->where('kondisi', 'rusak')
            ->where('jenisbarang', 'handphone')
            ->sum('jumlahbarang');

            return view('home', compact(
                'jp', 'tb', 'tbr', 'tbb', 'tbkb', 'tbru', 'tbl', 'tbh', 'tblr', 'tbhr',
                'tbbLaptop', 'tbkblaptop', 'tbruLaptop', 'tbbHandphone', 'tbkbHandphone', 'tbruHandphone'
            ));
    }
}
