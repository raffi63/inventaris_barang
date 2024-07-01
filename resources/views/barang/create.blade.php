@extends('adminlte::page') 
@section('title', 'Tambah Barang') 
@section('content_header') 
<h1 class="m-0 text-dark">Tambah Barang</h1> 
@stop
@section('content') 
<form action="{{ route('barang.store') }}" method="post"> 
@csrf
<div class="row"> 
<div class="col-12"> 
<div class="card"> 
<div class="card-body">
<div class="form-group"> 
<!-- <label for="exampleInputid">id</label> 
<input type="text" class="form-control @error('id') is-invalid @enderror" id="exampleInputid"
placeholder="id" name="id" value="{{ old('id') }}"> 
@error('id') <span class="text-danger">{{ $message }}</span> @enderror
</div> -->
<div class="form-group">
<label for="exampleInputid">ID Barang</label>
<input type="text" class="form-control @error('id') is-invalid @enderror"
id="exampleInputid" placeholder="" name="id" readonly>
@error('id') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group">
<label>Tipe Barang</label><br>
<input type="checkbox" class="barangCheckbox" data-prefix="02.03.04.01." name="barangType[]" value="hdd">
<label>HDD</label>
<input type="checkbox" class="barangCheckbox" data-prefix="02.01.05.01." name="barangType[]" value="handphone">
<label>Handphone</label>
<input type="checkbox" class="barangCheckbox" data-prefix="02.03.01.01." name="barangType[]" value="laptop">
<label>Laptop</label>
</div>
<div class="form-group">
<label for="exampleInputString">Additional ID</label>
<input type="text" class="form-control" id="exampleInputString"
placeholder="" name="additionalString">
</div>
<!-- batas -->
<div class="form-group"> 
<label for="exampleInputnamabarang">Nama Barang</label> 
<input type="text" class="form-control @error('namabarang') is-invalid @enderror" id="exampleInputnamabarang"
placeholder="namabarang" name="namabarang" value="{{ old('namabarang') }}"> 
@error('namabarang') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputDeskripsi">Deskripsi</label> 
<input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="exampleInputDeskripsi"
placeholder="Deskripsi" name="deskripsi" value="{{ old('deskripsi') }}"> 
@error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputSerialNumber">Serial Number</label> 
<input type="text" class="form-control @error('serialnumber') is-invalid @enderror" id="exampleInputSerialNumber"
placeholder="Serial Number" name="serialnumber" value="{{ old('serialnumber') }}"> 
@error('serialnumber') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
<!-- <div class="form-group"> 
<label for="exampleInputTahun">Tahun</label> 
<input type="text" class="form-control @error('tahun') is-invalid @enderror" id="exampleInputTahun"
placeholder="Tahun" name="tahun" value="{{ old('tahun') }}"> 
@error('tahun') <span class="text-danger">{{ $message }}</span> @enderror
</div>  -->
<div class="form-group">
<label for="exampleInputTahun">Tahun</label>
<select class="form-control @error('tahun') is-invalid @enderror" id="exampleInputTahun" name="tahun">
@php
$currentYear = date('Y');
$startYear = $currentYear - 10; // Adjust the number of years in the past
$endYear = $currentYear + 10; // Adjust the number of years in the future
@endphp
@for ($year = $startYear; $year <= $endYear; $year++)
<option value="{{ $year }}" {{ old('tahun') == $year ? 'selected' : '' }}>{{ $year }}</option>
@endfor
</select>
@error('tahun') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group"> 
<label for="exampleInputjumlahbarang">Jumlah Barang</label> 
<input type="text" class="form-control @error('jumlahbarang') is-invalid @enderror" id="exampleInputjumlahbarang"
placeholder="jumlahbarang" name="jumlahbarang" value="{{ old('jumlahbarang') }}"> 
@error('jumlahbarang') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputsatuan">Satuan</label> 
<select class="form-control @error('satuan') is-invalid @enderror" id="exampleInputsatuan" name="satuan"> 
<option value="unit" @if(old('satuan') == 'unit')selected @endif>unit</option> 
<option value="pcs" @if(old('satuan') == 'pcs')selected @endif>pcs</option> 
<option value="set" @if(old('satuan') == 'set')selected @endif>set</option> 
</select> 
@error('satuan') <span class="text-danger">{{$message}}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputkondisi">Kondisi</label> 
<select class="form-control @error('kondisi') is-invalid @enderror" id="exampleInputkondisi" name="kondisi"> 
<option value="baik" @if(old('kondisi') == 'baik')selected @endif>baik</option> 
<option value="kurangbaik" @if(old('kondisi') == 'kurangbaik')selected @endif>kurangbaik</option> 
<option value="rusak" @if(old('kondisi') == 'rusak')selected @endif>rusak</option> 
</select> 
@error('kondisi') <span class="text-danger">{{$message}}</span> @enderror
</div>  
<div class="form-group"> 
<label for="exampleInputketerangan">Keterangan</label> 
<input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="exampleInputketerangan"
placeholder="keterangan" name="keterangan" value="{{ old('keterangan') }}"> 
@error('keterangan') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputjenisbarang">Jenis Barang</label> 
<select class="form-control @error('jenisbarang') is-invalid @enderror" id="exampleInputjenisbarang" name="jenisbarang"> 
<option value="laptop" @if(old('jenisbarang') == 'laptop')selected @endif>laptop</option> 
<option value="storage" @if(old('jenisbarang') == 'storage')selected @endif>storage</option>
<option value="server" @if(old('jenisbarang') == 'server')selected @endif>server</option>
<option value="desktop" @if(old('jenisbarang') == 'desktop')selected @endif>desktop</option>
<option value="monitor" @if(old('jenisbarang') == 'monitor')selected @endif>monitor</option>
<option value="telekomunikasi" @if(old('jenisbarang') == 'telekomunikasi')selected @endif>telekomunikasi</option>
<option value="handphone" @if(old('jenisbarang') == 'handphone')selected @endif>handphone</option>
<option value="aksesoris" @if(old('jenisbarang') == 'aksesoris')selected @endif>aksesoris</option>
<option value="perangkatjaringan" @if(old('jenisbarang') == 'perangkatjaringan')selected @endif>perangkatjaringan</option>
<option value="elektronik" @if(old('jenisbarang') == 'elektronik')selected @endif>elektronik</option>
</select> 
@error('jenisbarang') <span class="text-danger">{{$message}}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputruang">Ruang</label> 
<select class="form-control @error('ruang') is-invalid @enderror" id="exampleInputruang" name="ruang"> 
<option value="1" @if(old('ruang') == '1')selected @endif>1</option> 
<option value="18" @if(old('ruang') == '18')selected @endif>18</option>
<option value="site" @if(old('ruang') == 'site')selected @endif>site</option>  
</select> 
@error('ruang') <span class="text-danger">{{$message}}</span> @enderror
</div>  
<div class="form-group"> 
<label for="exampleInputstatus">Status</label> 
<select class="form-control @error('status') is-invalid @enderror" id="exampleInputstatus" name="status"> 
<option value="ready" @if(old('status') == 'ready')selected @endif>ready</option> 
<option value="keluar" @if(old('status') == 'keluar')selected @endif>keluar</option> 
<option value="rusak" @if(old('status') == 'rusak')selected @endif>rusak</option> 
<option value="stay" @if(old('status') == 'stay')selected @endif>stay</option> 
<option value="dalamperbaikan" @if(old('status') == 'dalamperbaikan')selected @endif>dalamperbaikan</option> 
<option value="hilang" @if(old('status') == 'hilang')selected @endif>hilang</option> 
</select> 
@error('status') <span class="text-danger">{{$message}}</span> @enderror
</div> 
</div> 
<div class="card-footer"> 
<button type="submit" class="btn btn-primary">Simpan</button> 
<a href="{{ route('barang.index') }}" class="btn btn-danger">Batal</a> 
</div> 
</div> 
</div> 
</div> 
</form>
<script>
document.addEventListener('DOMContentLoaded', function () {
var idInput = document.getElementById('exampleInputid');
var barangCheckboxes = document.querySelectorAll('.barangCheckbox');
var stringInput = document.getElementById('exampleInputString');

var generateId = function () {
var prefix = '';
barangCheckboxes.forEach(function (checkbox) {
if (checkbox.checked) {
prefix = checkbox.getAttribute('data-prefix');
}
});

var additionalString = stringInput.value || '';
idInput.value = prefix + additionalString;
};

barangCheckboxes.forEach(function (checkbox) {
checkbox.addEventListener('change', generateId);
});

stringInput.addEventListener('input', generateId);

generateId(); // Call generateId initially to set the initial state
});
</script>
@stop
