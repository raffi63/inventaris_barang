@extends('adminlte::page')
@section('title', 'Detail Barang')
@section('content_header')
<h1 class="m-0 text-dark">Detail Barang</h1>
@stop
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="form-group">
<label for="exampleInputid">ID</label>
<p class="form-control" id="exampleInputid">{{ $barang->id }}</p>
</div>
<div class="form-group">
<label for="exampleInputnamabarang">Nama Barang</label>
<p class="form-control" id="exampleInputnamabarang">{{ $barang->namabarang }}</p>
</div>
<div class="form-group">
<label for="exampleInputDeskripsi">Deskripsi</label>
<p class="form-control" id="exampleInputDeskripsi">{{ $barang->deskripsi }}</p>
</div>
<div class="form-group">
<label for="exampleInputSerialNumber">Serial Number</label>
<p class="form-control" id="exampleInputSerialNumber">{{ $barang->serialnumber }}</p>
</div>
<div class="form-group">
<label for="exampleInputTahun">Tahun</label>
<p class="form-control" id="exampleInputTahun">{{ $barang->tahun }}</p>
</div>
<div class="form-group">
<label for="exampleInputJumlahBarang">Jumlah Barang</label>
<p class="form-control" id="exampleInputJumlahBarang">{{ $barang->jumlahbarang }}</p>
</div>
<div class="form-group">
<label for="exampleInputSatuan">Satuan</label>
<p class="form-control" id="exampleInputSatuan">{{ $barang->satuan }}</p>
</div>
<div class="form-group">
<label for="exampleInputKondisi">Kondisi</label>
<p class="form-control" id="exampleInputKondisi">{{ $barang->kondisi }}</p>
</div>
<div class="form-group">
<label for="exampleInputKeterangan">Keterangan</label>
<p class="form-control" id="exampleInputKeterangan">{{ $barang->keterangan }}</p>
</div>
<div class="form-group">
<label for="exampleInputJenisBarang">Jenis Barang</label>
<p class="form-control" id="exampleInputJenisBarang">{{ $barang->jenisbarang }}</p>
</div>
<div class="form-group">
<label for="exampleInputruang">Ruang</label>
<p class="form-control" id="exampleInputruang">{{ $barang->ruang }}</p>
</div>
<div class="form-group">
<label for="exampleInputstatus">Status</label>
<p class="form-control" id="exampleInputstatus">{{ $barang->status }}</p>
</div>
</div>
<div class="card-footer">
<a href="{{ route('barang.index') }}" class="btn btn-default">Kembali</a>
</div>
</div>
</div>
</div>
@stop
