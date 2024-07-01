@extends('adminlte::page')
@section('title', 'Detail Barang Masuk')
@section('content_header')
<h1 class="m-0 text-dark">Detail Barang Masuk</h1>
@stop
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<!-- Add your details fields here -->
<!-- Example: -->
<div class="form-group">
<label for="exampleInputid">ID</label>
<p class="form-control" id="exampleInputid">{{ $barangmasuk->id }}</p>
</div>
<div class="form-group">
<label for="exampleInputidkeluar">Barang Keluar</label>
<p class="form-control" id="exampleInputidkeluar">{{ $barangmasuk->barangkeluar->id }} - {{$barangmasuk->barangkeluar->barang->namabarang}}</p>
</div>
<div class="form-group">
<label for="exampleInputjumlahmasuk">Jumlah Masuk</label>
<p class="form-control" id="exampleInputjumlahmasuk">{{ $barangmasuk->jumlahmasuk }}</p>
</div>
<div class="form-group">
<label for="exampleInputstatusmasuk">Status Masuk</label>
<p class="form-control" id="exampleInputstatusmasuk">{{ $barangmasuk->statusmasuk }}</p>
</div>
<div class="form-group">
<label for="exampleInputtanggal">Tanggal</label>
<p class="form-control" id="exampleInputtanggal">{{ $barangmasuk->tanggal }}</p>
</div>
<!-- End of details fields -->
</div>
<div class="card-footer">
<a href="{{ route('barangmasuk.index') }}" class="btn btn-default">Kembali</a>
</div>
</div>
</div>
</div>
@stop
