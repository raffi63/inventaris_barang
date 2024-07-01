@extends('adminlte::page')
@section('title', 'Detail Barang Keluar')
@section('content_header')
<h1 class="m-0 text-dark">Detail Barang Keluar</h1>
@stop
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="form-group">
<label for="exampleInputid">ID</label>
<p class="form-control" id="exampleInputid">{{ $barangkeluar->id }}</p>
</div>
<div class="form-group">
<label for="exampleInputidbarang">Barang</label>
<p class="form-control" id="exampleInputidbarang">{{ $barangkeluar->barang->namabarang }}</p>
</div>
<div class="form-group">
<label for="exampleInputidpegawai">Pegawai</label>
<p class="form-control" id="exampleInputidpegawai">{{ $barangkeluar->pegawai->namapegawai }}</p>
</div>
<div class="form-group">
<label for="exampleInputstatuskeluar">Status Keluar</label>
<p class="form-control" id="exampleInputstatuskeluar">{{ $barangkeluar->statuskeluar }}</p>
</div>
<div class="form-group">
<label for="exampleInputjumlahkeluar">Jumlah Keluar</label>
<p class="form-control" id="exampleInputjumlahkeluar">{{ $barangkeluar->jumlahkeluar }}</p>
</div>
<div class="form-group">
<label for="exampleInputtanggal">Tanggal</label>
<p class="form-control" id="exampleInputtanggal">{{ $barangkeluar->tanggal }}</p>
</div>
<!-- Add other fields as needed -->
</div>
<div class="card-footer">
<a href="{{ route('barangkeluar.index') }}" class="btn btn-default">Kembali</a>
</div>
</div>
</div>
</div>
@stop
