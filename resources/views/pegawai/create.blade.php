@extends('adminlte::page') 
@section('title', 'Tambah Pegawai') 
@section('content_header') 
<h1 class="m-0 text-dark">Tambah Pegawai</h1> 
@stop
@section('content') 
<form action="{{ route('pegawai.store') }}" method="post"> 
@csrf
<div class="row"> 
<div class="col-12"> 
<div class="card"> 
<div class="card-body">
<div class="form-group"> 
<label for="exampleInputnamapegawai">Nama Pegawai</label> 
<input type="text" class="form-control @error('namapegawai') is-invalid @enderror" id="exampleInputnamapegawai"
placeholder="Nama Pegawai" name="namapegawai" value="{{ old('namapegawai') }}"> 
@error('namapegawai') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group"> 
<label for="exampleInputnip">NIP</label> 
<input type="text" class="form-control @error('nip') is-invalid @enderror" id="exampleInputnip"
placeholder="NIP" name="nip" value="{{ old('nip') }}"> 
@error('nip') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputjabatan">Jabatan</label> 
<select class="form-control @error('jabatan') is-invalid @enderror" id="exampleInputjabatan" name="jabatan"> 
<option value="ceo" @if(old('jabatan') == 'ceo')selected @endif>CEO</option> 
<option value="director" @if(old('jabatan') == 'director')selected @endif>Director</option>
<option value="securityanalyst" @if(old('jabatan') == 'securityanalyst')selected @endif>Security Analyst</option>
<option value="reporting" @if(old('jabatan') == 'reporting')selected @endif>Reporting</option>
<option value="ssm" @if(old('jabatan') == 'ssm')selected @endif>SSM</option>
<option value="hr" @if(old('jabatan') == 'hr')selected @endif>HR</option>
<option value="financeaccounting" @if(old('jabatan') == 'financeaccounting')selected @endif>Finance & Accounting</option>
<option value="operational" @if(old('jabatan') == 'operational')selected @endif>Operational</option>
<option value="salesmarketing" @if(old('jabatan') == 'salesmarketing')selected @endif>Sales & Marketing</option>
</select> 
@error('jabatan') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
<div class="form-group"> 
<label for="exampleInputdivisi">Divisi</label> 
<select class="form-control @error('divisi') is-invalid @enderror" id="exampleInputdivisi" name="divisi"> 
<option value="all" @if(old('divisi') == 'all')selected @endif>All</option> 
<option value="tehnikal" @if(old('divisi') == 'tehnikal')selected @endif>Tehnikal</option>
<option value="training" @if(old('divisi') == 'training')selected @endif>Training</option>
<option value="finance" @if(old('divisi') == 'finance')selected @endif>Finance</option>
<option value="hr" @if(old('divisi') == 'hr')selected @endif>HR</option>
<option value="operational" @if(old('divisi') == 'operational')selected @endif>Operational</option>
</select> 
@error('divisi') <span class="text-danger">{{ $message }}</span> @enderror
</div>
<div class="form-group"> 
<label for="exampleInputstatus">status</label> 
<select class="form-control @error('status') is-invalid @enderror" id="exampleInputstatus" name="status"> 
<option value="inactive" @if(old('status') == 'inactive')selected @endif>Inactive</option> 
<option value="active" @if(old('status') == 'active')selected @endif>Active</option>
</select> 
@error('status') <span class="text-danger">{{ $message }}</span> @enderror
</div> 
</div> 
<div class="card-footer"> 
<button type="submit" class="btn btn-primary">Simpan</button> 
<a href="{{ route('pegawai.index') }}" class="btn btn-danger">Batal</a> 
</div> 
</div> 
</div> 
</div> 
</form>
@stop
