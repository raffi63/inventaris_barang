@extends('adminlte::page')
@section('title', 'Edit Pegawai')
@section('content_header')
<h1 class="m-0 text-dark">Edit Pegawai</h1>
@stop
@section('content')
<form action="{{ route('pegawai.update', $pegawai) }}" method="post">
@method('PUT')
@csrf
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="form-group">
<label for="exampleInputid">ID</label>
<p class="form-control" id="exampleInputid">{{ $pegawai->id ?? old('id') }}</p>
</div>
<div class="form-group">
<label for="exampleInputnamapegawai">Nama Pegawai</label>
<input type="text" class="form-control @error('namapegawai') is-invalid @enderror"
id="exampleInputnamapegawai" placeholder="Nama Pegawai" name="namapegawai"
value="{{ $pegawai->namapegawai ?? old('namapegawai') }}">
@error('namapegawai') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputnip">NIP</label>
<input type="text" class="form-control @error('nip') is-invalid @enderror"
id="exampleInputnip" placeholder="NIP" name="nip"
value="{{ $pegawai->nip ?? old('nip') }}">
@error('nip') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputjabatan">Jabatan</label>
<select class="form-control @error('jabatan') is-invalid @enderror"
id="exampleInputjabatan" name="jabatan">
@php
$jabatanList = ['ceo', 'director', 'securityanalyst', 'reporting', 'ssm', 'hr',
'financeaccounting', 'operational', 'salesmarketing'];
@endphp
@foreach ($jabatanList as $jabatan)
<option value="{{ $jabatan }}"
@if ($pegawai->jabatan == $jabatan || old('jabatan') == $jabatan) selected @endif>
{{ ucfirst($jabatan) }}
</option>
@endforeach
</select>
@error('jabatan') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputdivisi">Divisi</label>
<select class="form-control @error('divisi') is-invalid @enderror"
id="exampleInputdivisi" name="divisi">
@php
$divisiList = ['all', 'tehnikal', 'training', 'finance', 'hr', 'operational'];
@endphp
@foreach ($divisiList as $divisi)
<option value="{{ $divisi }}"
@if ($pegawai->divisi == $divisi || old('divisi') == $divisi) selected @endif>
{{ ucfirst($divisi) }}
</option>
@endforeach
</select>
@error('divisi') <span class="text-danger">{{ $message }}</span> @enderror
</div>
</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('pegawai.index') }}" class="btn btn-default">Batal</a>
</div>
</div>
</div>
</div>
</form>
@stop
