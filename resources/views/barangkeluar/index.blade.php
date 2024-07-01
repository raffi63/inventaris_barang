@extends('adminlte::page')
@section('title', 'List Barang Keluar')
@section('content_header')
<h1 class="m-0 text-dark">List Barang Keluar</h1>
@stop
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<a href="{{ route('barangkeluar.create') }}" class="btn btn-primary mb-2">
Tambah
</a>
<table class="table table-hover table-bordered table-stripped" id="example2">
<thead>
<tr>
<th>No.</th>
<th>ID Barang Keluar</th>
<th>ID Barang</th>
<th>ID Pegawai</th>
<th>Status Keluar</th>
<th>Jumlah Keluar</th>
<th>Tanggal</th>
<th>Opsi</th>
</tr>
</thead>
<tbody>
@foreach($barangKeluar as $key => $item)
<tr>
<td>{{ $key + 1 }}</td>
<td>{{ $item->id }}</td>
<td>{{ $item->idbarang }}</td>
<td>{{ $item->idpegawai }}</td>
<td>{{ $item->statuskeluar }}</td>
<td>{{ $item->jumlahkeluar }}</td>
<td>{{ $item->tanggal }}</td>
<td>
<a href="{{ route('barangkeluar.edit', $item->id) }}"
class="btn btn-primary btn-xs">Edit</a>
<a href="{{ route('barangkeluar.show', $item->id) }}"
class="btn btn-success btn-xs">Show</a>
<a href="{{ route('barangkeluar.destroy', $item->id) }}"
onclick="notificationBeforeDelete(event, this)"
class="btn btn-danger btn-xs">Delete</a>
</td>
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
<form action="" id="delete-form" method="post">
@method('delete')
@csrf
</form>
<script>
$('#example2').DataTable({
"responsive": true,
});

function notificationBeforeDelete(event, el) {
event.preventDefault();
if (confirm('Apakah anda yakin akan menghapus data ? ')) {
$("#delete-form").attr('action', $(el).attr('href'));
$("#delete-form").submit();
}
}
</script>
@endpush
