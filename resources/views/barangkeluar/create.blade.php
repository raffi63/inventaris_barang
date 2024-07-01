@extends('adminlte::page')
@section('title', 'Tambah Barang Keluar')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Barang Keluar</h1>
@stop
@section('content')
<form action="{{ route('barangkeluar.store') }}" method="post">
@csrf
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<!-- <div class="form-group">
<label for="exampleInputid">ID Barang Keluar</label>
<input type="text" class="form-control @error('id') is-invalid @enderror" id="exampleInputid"
placeholder="ID Barang Keluar" name="id" value="{{ old('id') }}">
@error('id') <span class="text-danger">{{ $message }}</span> @enderror
</div> -->
<div class="form-group">
<label for="exampleInputid">ID Barang Keluar</label>
{{-- Use the desired ID format here --}}
<input type="text" class="form-control @error('id') is-invalid @enderror"
id="exampleInputid" placeholder="ID Barang Keluar" name="id"
value="{{ 'BK-' . str_pad($nextId, 6, '0', STR_PAD_LEFT) }}" readonly>
@error('id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputidbarang">Barang</label>
<select class="form-control @error('idbarang') is-invalid @enderror" id="exampleInputidbarang"
name="idbarang">
@foreach($barangList as $barang)
<option value="{{ $barang->id }}">{{ $barang->id }} - {{ $barang->namabarang }}</option>
@endforeach
</select>
@error('idbarang') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputidpegawai">Pegawai</label>
<select class="form-control @error('idpegawai') is-invalid @enderror" id="exampleInputidpegawai"
name="idpegawai">
@foreach($pegawaiList as $pegawai)
<option value="{{ $pegawai->id }}">{{ $pegawai->namapegawai }}</option>
@endforeach
</select>
@error('idpegawai') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group" style="display: none;">
<label for="exampleInputstatuskeluar">Status Keluar</label>
<select class="form-control @error('statuskeluar') is-invalid @enderror"
id="exampleInputstatuskeluar" name="statuskeluar">
<option value="keluar" @if(old('statuskeluar') == 'keluar')selected @endif>Keluar</option>
<option value="ready" @if(old('statuskeluar') == 'ready')selected @endif>Ready</option>
</select>
@error('statuskeluar') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<!-- <div class="form-group">
<label for="exampleInputjumlahkeluar">Jumlah Keluar</label>
<input type="text" class="form-control @error('jumlahkeluar') is-invalid @enderror"
id="exampleInputjumlahkeluar" placeholder="Jumlah Keluar" name="jumlahkeluar"
value="{{ old('jumlahkeluar') }}">
@error('jumlahkeluar') <span class="text-danger">{{ $message }}</span> @enderror
</div> -->
<div class="form-group">
<label for="exampleInputjumlahkeluar">Jumlah Keluar</label>
<input type="checkbox" id="editJumlahKeluarCheckbox"> Edit Jumlah Keluar
<input type="text" class="form-control @error('jumlahkeluar') is-invalid @enderror"
id="exampleInputjumlahkeluar" placeholder="Jumlah Keluar" name="jumlahkeluar"
value="{{ old('jumlahkeluar', 1) }}" readonly>
@error('jumlahkeluar') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputtanggal">Tanggal</label>
<input type="date" class="form-control @error('tanggal') is-invalid @enderror"
id="exampleInputtanggal" placeholder="Tanggal" name="tanggal" value="{{ old('tanggal') }}">
@error('tanggal') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<!-- Add other fields as needed -->
</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('barangkeluar.index') }}" class="btn btn-danger">Batal</a>
</div>
</div>
</div>
</div>
</form>
<script>
document.addEventListener('DOMContentLoaded', function () {
var editCheckbox = document.getElementById('editJumlahKeluarCheckbox');
var jumlahKeluarInput = document.getElementById('exampleInputjumlahkeluar');

editCheckbox.addEventListener('change', function () {
jumlahKeluarInput.readOnly = !editCheckbox.checked;

// Set the value to 1 if editing is disabled
if (!editCheckbox.checked) {
jumlahKeluarInput.value = 1;
}
});
});
</script>
@stop
