@extends('adminlte::page')

@section('title', 'Log Barang - Index')

@section('content_header')
<h1 class="m-0 text-dark">Log Barang - Index</h1>
@stop

@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>ID</th>
<th>Barang</th>
<th>Status Lama</th>
<th>Status Baru</th>
<th>Tanggal</th>
</tr>
</thead>
<tbody>
@forelse($logbarang as $log)
<tr>
<td>{{ $log->id }}</td>
<td>{{ $log->barang->namabarang }}</td>
<td>{{ $log->statuslama }}</td>
<td>{{ $log->statusbaru }}</td>
<td>{{ $log->logtanggal }}</td>
</tr>
@empty
<tr>
<td colspan="5" class="text-center">No log barang records found.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
</div>
@stop
