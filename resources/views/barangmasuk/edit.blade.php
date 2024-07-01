@extends('adminlte::page')
@section('title', 'Edit Barang Masuk')
@section('content_header')
<h1 class="m-0 text-dark">Edit Barang Masuk</h1>
@stop
@section('content')
<form action="{{ route('barangmasuk.update', $barangmasuk->id) }}" method="post">
@method('PUT')
@csrf
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<!-- Add your form fields here -->
<!-- Example: -->
<div class="form-group">
<label for="exampleInputidkeluar">Barang Keluar</label>
<select class="form-control @error('idkeluar') is-invalid @enderror" id="exampleInputidkeluar"
name="idkeluar">
@foreach ($barangKeluarList as $barangKeluar)
<option value="{{ $barangKeluar->id }}"
{{ $barangmasuk->idkeluar == $barangKeluar->id ? 'selected' : '' }}>
{{ $barangKeluar->id }}</option>
@endforeach
</select>
@error('idkeluar')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
<label for="exampleInputjumlahmasuk">Jumlah Masuk</label>
<input type="number" class="form-control @error('jumlahmasuk') is-invalid @enderror"
id="exampleInputjumlahmasuk" placeholder="Jumlah Masuk" name="jumlahmasuk"
value="{{ $barangmasuk->jumlahmasuk }}">
@error('jumlahmasuk')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
<label for="exampleInputstatusmasuk">Status Masuk</label>
<select class="form-control @error('statusmasuk') is-invalid @enderror"
id="exampleInputstatusmasuk" name="statusmasuk">
<option value="ready" @if ($barangmasuk->statusmasuk == 'ready') selected @endif>Ready
</option>
</select>
@error('statusmasuk')
<span class="text-danger">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
<label for="exampleInputtanggal">Tanggal</label>
<input type="date" class="form-control @error('tanggal') is-invalid @enderror"
id="exampleInputtanggal" name="tanggal" value="{{ $barangmasuk->tanggal }}">
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
@stop
