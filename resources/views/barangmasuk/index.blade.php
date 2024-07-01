@extends('adminlte::page')
@section('title', 'List Barang Masuk')
@section('content_header')
<h1 class="m-0 text-dark">List Barang Masuk</h1>
@stop
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<a href="{{ route('barangmasuk.create') }}" class="btn btn-primary mb-2">Tambah</a>
<table class="table table-hover table-bordered table-stripped" id="example2">
<!-- Add table headers here -->
<!-- Example: -->
<thead>
<tr>
<th>No.</th>
<th>ID</th>
<th>Barang Keluar</th>
<th>Jumlah Masuk</th>
<th>Status Masuk</th>
<th>Tanggal</th>
<th>Opsi</th>
</tr>
</thead>
<tbody>
@foreach ($barangmasuk as $key => $barangmasuk)
<tr>
<td>{{ $key + 1 }}</td>
<td>{{ $barangmasuk->id }}</td>
<td>{{ $barangmasuk->barangkeluar->id }}</td>
<td>{{ $barangmasuk->jumlahmasuk }}</td>
<td>{{ $barangmasuk->statusmasuk }}</td>
<td>{{ $barangmasuk->tanggal }}</td>
<td>
<a href="{{ route('barangmasuk.edit', $barangmasuk->id) }}"
class="btn btn-primary btn-xs">Edit</a>
<a href="{{ route('barangmasuk.show', $barangmasuk->id) }}"
class="btn btn-success btn-xs">Show</a>
<a href="{{ route('barangmasuk.destroy', $barangmasuk->id) }}"
onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">Delete</a>
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
