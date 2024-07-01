@extends('adminlte::page')
@section('title', 'Edit Barang')
@section('content_header')
<h1 class="m-0 text-dark">Edit Barang</h1>
@stop
@section('content')
<form action="{{ route('barang.update', $barang) }}" method="post">
@method('PUT')
@csrf
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<div class="form-group">
<label for="exampleInputid">ID</label>
<p class="form-control" id="exampleInputid">
{{ $barang->id ?? old('id') }}
</p>
</div>
<div class="form-group">
<label for="exampleInputnamabarang">namabarang</label>
<input type="text" class="form-control @error('namabarang') is-invalid @enderror" id="exampleInputnamabarang"
placeholder="namabarang" name="namabarang" value="{{ $barang->namabarang ?? old('namabarang') }}">
@error('namabarang') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputDeskripsi">Deskripsi</label>
<input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleInputDeskripsi"
placeholder="Deskripsi" name="deskripsi" value="{{ $barang->deskripsi ?? old('deskripsi') }}">
@error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputSerialNumber">Serial Number</label>
<input type="text" class="form-control @error('serialnumber') is-invalid @enderror" id="exampleInputSerialNumber"
placeholder="Serial Number" name="serialnumber" value="{{ $barang->serialnumber ?? old('serialnumber') }}">
@error('serialnumber') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputTahun">Tahun</label>
<input type="number" class="form-control @error('tahun') is-invalid @enderror" id="exampleInputTahun"
placeholder="Tahun" name="tahun" value="{{ $barang->tahun ?? old('tahun') }}">
@error('tahun') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputJumlahBarang">Jumlah Barang</label>
<input type="number" class="form-control @error('jumlahbarang') is-invalid @enderror" id="exampleInputJumlahBarang"
placeholder="Jumlah Barang" name="jumlahbarang" value="{{ $barang->jumlahbarang ?? old('jumlahbarang') }}">
@error('jumlahbarang') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputSatuan">Satuan</label>
<select class="form-control @error('satuan') is-invalid @enderror" id="exampleInputSatuan" name="satuan">
<option value="unit" @if($barang->satuan == 'unit' || old('satuan') == 'unit') selected @endif>Unit</option>
<option value="pcs" @if($barang->satuan == 'pcs' || old('satuan') == 'pcs') selected @endif>Pcs</option>
<option value="set" @if($barang->satuan == 'set' || old('satuan') == 'set') selected @endif>Set</option>
</select>
@error('satuan') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputKondisi">Kondisi</label>
<select class="form-control @error('kondisi') is-invalid @enderror" id="exampleInputKondisi" name="kondisi">
<option value="baik" @if($barang->kondisi == 'baik' || old('kondisi') == 'baik') selected @endif>Baik</option>
<option value="kurangbaik" @if($barang->kondisi == 'kurangbaik' || old('kondisi') == 'kurangbaik') selected @endif>Kurang Baik</option>
<option value="rusak" @if($barang->kondisi == 'rusak' || old('kondisi') == 'rusak') selected @endif>Rusak</option>
</select>
@error('kondisi') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputKeterangan">Keterangan</label>
<input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="exampleInputKeterangan"
placeholder="Keterangan" name="keterangan" value="{{ $barang->keterangan ?? old('keterangan') }}">
@error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputJenisBarang">Jenis Barang</label>
<select class="form-control @error('jenisbarang') is-invalid @enderror" id="jenisbarang" name="jenisbarang">
@php
$baranglist = ['laptop','storage','server','desktop','monitor','telekomunikasi','handphone','aksesoris','perangkatjaringan','elektronik'];
@endphp
@foreach($baranglist as $list)
<option value="{{ $list }}" @if($barang->jenisbarang == $list || old('jenisbarang') == $list) selected @endif>{{ $list }}</option>
@endforeach
</select>
@error('jenisbarang') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputruang">ruang</label>
<select class="form-control @error('ruang') is-invalid @enderror" id="ruang" name="ruang">
@php
$ruanglist = ['1', '18', 'site'];
@endphp
@foreach($ruanglist as $list)
<option value="{{ $list }}" @if($barang->ruang == $list || old('ruang') == $list) selected @endif>{{ $list }}</option>
@endforeach
</select>
@error('ruang') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label for="exampleInputstatus">status</label>
<select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
@php
$statuslist = ['ready', 'keluar', 'rusak', 'dalamperbaikan', 'stay', 'hilang'];
@endphp
@foreach($statuslist as $list)
<option value="{{ $list }}" @if($barang->status == $list || old('status') == $list) selected @endif>{{ $list }}</option>
@endforeach
</select>
@error('status') <span class="text-danger">{{ $message }}</span> @enderror
</div>
</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{route('users.index')}}" class="btn btn-danger">
Batal
</a>
</div>
</div>
</div>
</form>
@stop
