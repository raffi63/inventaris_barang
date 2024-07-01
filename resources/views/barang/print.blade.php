@extends('adminlte::page')
@section('title', 'List Barang')
@section('content_header')
<h1 class="m-0 text-dark">List Barang</h1>
@stop
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<!-- Button trigger modal -->
<table class="table table-hover table-bordered table-stripped" id="example2">
<thead>
<tr>
<th>ID Barang</th>
<th>Nama Barang</th>
<th>Tahun</th>
<th>Jumlah Barang</th>
<th>Ruang</th>
<th>Status</th>
<th>Jenis Barang</th>
</tr>
</thead>
<tbody>
@foreach($barang as $key => $barangs)
<tr>
<td>{{ $barangs->id }}</td>
<td>{{ $barangs->namabarang }}</td>
<td>{{ $barangs->tahun }}</td>
<td>{{ $barangs->jumlahbarang }}</td>
<td>{{ $barangs->ruang }}</td>
<td>{{ $barangs->status }}</td>
<td>{{ $barangs->jenisbarang }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>

@stop
@push('js')
<script>
$('#example2').DataTable({
"responsive": true,
});

</script>
@endpush
