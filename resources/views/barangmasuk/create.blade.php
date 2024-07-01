@extends('adminlte::page')
@section('title', 'Tambah Barang Masuk')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Barang Masuk</h1>
@stop
@section('content')
<form action="{{ route('barangmasuk.store') }}" method="post">
@csrf
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<!-- Add your form fields here -->
<!-- Example: -->
<!-- <div class="form-group">
<label for="exampleInputid">id</label>
<input type="text" class="form-control @error('id') is-invalid @enderror"
id="exampleInputid" placeholder="id" name="id" value="{{ old('id') }}">
@error('id') <span class="text-danger">{{ $message }}</span> @enderror
</div> -->
<div class="form-group">
<label for="exampleInputid">ID Barang masuk</label>
{{-- Use the desired ID format here --}}
<input type="text" class="form-control @error('id') is-invalid @enderror"
id="exampleInputid" placeholder="ID Barang masuk" name="id"
value="{{ 'BM-' . str_pad($nextId, 6, '0', STR_PAD_LEFT) }}" readonly>
@error('id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputidkeluar">Barang Keluar</label>
<select class="form-control @error('idkeluar') is-invalid @enderror" id="exampleInputidkeluar"
name="idkeluar">
@foreach ($barangKeluarList as $barangKeluar)
<option value="{{ $barangKeluar->id }}">{{ $barangKeluar->id }} - {{$barangKeluar->barang->namabarang}}</option>
@endforeach
</select>
@error('idkeluar')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
<!-- <div class="form-group">
<label for="exampleInputjumlahmasuk">Jumlah Masuk</label>
<input type="number" class="form-control @error('jumlahmasuk') is-invalid @enderror"
id="exampleInputjumlahmasuk" placeholder="Jumlah Masuk" name="jumlahmasuk"
value="{{ old('jumlahmasuk') }}">
@error('jumlahmasuk')
<span class="text-danger">{{ $message }}</span>
@enderror
</div> -->
<div class="form-group">
<label for="exampleInputjumlahmasuk">Jumlah Masuk</label>
<input type="checkbox" id="editJumlahmasukCheckbox"> Edit Jumlah Masuk
<input type="text" class="form-control @error('jumlahmasuk') is-invalid @enderror"
id="exampleInputjumlahmasuk" placeholder="Jumlah Keluar" name="jumlahmasuk"
value="{{ old('jumlahmasuk', 1) }}" readonly>
@error('jumlahmasuk') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group" style="display: none;">
<label for="exampleInputstatusmasuk">Status Masuk</label>
<select class="form-control @error('statusmasuk') is-invalid @enderror"
id="exampleInputstatusmasuk" name="statusmasuk">
<option value="ready" @if (old('statusmasuk') == 'ready') selected @endif>Ready</option>
</select>
@error('statusmasuk')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
<label for="exampleInputtanggal">Tanggal</label>
<input type="date" class="form-control @error('tanggal') is-invalid @enderror"
id="exampleInputtanggal" name="tanggal" value="{{ old('tanggal') }}">
@error('tanggal')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
<!-- End of form fields -->
</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('barangmasuk.index') }}" class="btn btn-danger">Batal</a>
</div>
</div>
</div>
</div>
</form>
<script>
document.addEventListener('DOMContentLoaded', function () {
var editCheckbox = document.getElementById('editJumlahmasukCheckbox');
var jumlahmasukInput = document.getElementById('exampleInputjumlahmasuk');

editCheckbox.addEventListener('change', function () {
jumlahmasukInput.readOnly = !editCheckbox.checked;

// Set the value to 1 if editing is disabled
if (!editCheckbox.checked) {
jumlahmasukInput.value = 1;
}
});
});
</script>
@stop
