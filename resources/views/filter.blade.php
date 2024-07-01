@extends('adminlte::page')
@section('title', 'Dashboard Laporan Barang')
@section('content_header')
<h1 class="m-0 text-light">Laporan Barang</h1>
@stop
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">
Data Barang
</div>

<div class="card-body">
<form method="get" action="{{ route('filter') }}" class="form-inline">
<!-- Add filters for other fields -->
<div class="form-group mb-2">
<label for="status" class="">Status</label>
<input type="text" class="form-control" id="status" name="status"
placeholder="status" value="{{ old('status') }}">
</div>
<!-- Add filters for other fields -->

<button type="submit" class="btn btn-navy bg-gradient-navy mb-2">Filter</button>
</form>

<div class="table-responsive">
<table id="tlaporan" class="table table-striped table-bordered table-hover">
<thead class="thead-inverse">
<tr>
<th>ID Barang</th>
<th>Nama Barang</th>
<th>Deskripsi</th>
<th>Serial Number</th>
<th>Tahun</th>
<th>Jumlah Barang</th>
<th>Satuan</th>
<th>Kondisi</th>
<th>Keterangan</th>
<th>Jenis Barang</th>
<th>Ruang</th>
<th>Status</th>
<th>Opsi</th>
</tr>
</thead>
<tbody>
@foreach ($data as $key => $value)
<tr>
<td>{{ $value->id }}</td>
<td>{{ $value->namabarang }}</td>
<td>{{ $value->deskripsi }}</td>
<td>{{ $value->serialnumber }}</td>
<td>{{ $value->tahun }}</td>
<td>{{ $value->jumlahbarang }}</td>
<td>{{ $value->satuan }}</td>
<td>{{ $value->kondisi }}</td>
<td>{{ $value->keterangan }}</td>
<td>{{ $value->jenisbarang }}</td>
<td>{{ $value->ruang }}</td>
<td>{{ $value->status }}</td>
<td>
<!-- Add links or buttons for additional options -->
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
