@extends('adminlte::page')
@section('title', 'Edit Barang Keluar')
@section('content_header')
<h1 class="m-0 text-dark">Edit Barang Keluar</h1>
@stop
@section('content')
<form action="{{ route('barangkeluar.update', $barangkeluar) }}" method="post">
@method('PUT')
@csrf
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="form-group">
<label for="exampleInputid">ID Barang Keluar</label>
<p class="form-control" id="exampleInputid">
{{ $barangkeluar->id ?? old('id') }}
</p>
</div>
<div class="form-group">
<label for="exampleInputidbarang">ID Barang</label>
<input type="text" class="form-control @error('idbarang') is-invalid @enderror"
id="exampleInputidbarang" placeholder="ID Barang" name="idbarang"
value="{{ $barangkeluar->idbarang ?? old('idbarang') }}">
@error('idbarang') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputidpegawai">ID Pegawai</label>
<input type="text" class="form-control @error('idpegawai') is-invalid @enderror"
id="exampleInputidpegawai" placeholder="ID Pegawai" name="idpegawai"
value="{{ $barangkeluar->idpegawai ?? old('idpegawai') }}">
@error('idpegawai') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputstatuskeluar">Status Keluar</label>
<select class="form-control @error('statuskeluar') is-invalid @enderror"
id="exampleInputstatuskeluar" name="statuskeluar">
<option value="keluar" @if($barangkeluar->statuskeluar == 'keluar' || old('statuskeluar') == 'keluar') selected @endif>Keluar</option>
<option value="ready" @if($barangkeluar->statuskeluar == 'ready' || old('statuskeluar') == 'ready') selected @endif>Ready</option>
</select>
@error('statuskeluar') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputjumlahkeluar">Jumlah Keluar</label>
<input type="text" class="form-control @error('jumlahkeluar') is-invalid @enderror"
id="exampleInputjumlahkeluar" placeholder="Jumlah Keluar" name="jumlahkeluar"
value="{{ $barangkeluar->jumlahkeluar ?? old('jumlahkeluar') }}">
@error('jumlahkeluar') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputtanggal">Tanggal</label>
<input type="text" class="form-control @error('tanggal') is-invalid @enderror"
id="exampleInputtanggal" placeholder="Tanggal" name="tanggal"
value="{{ $barangkeluar->tanggal ?? old('tanggal') }}">
@error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<!-- Add other fields as needed -->
</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('barangkeluar.index') }}" class="btn btn-default">
Batal
</a>
</div>
</div>
</div>
</div>
</form>
@stop
