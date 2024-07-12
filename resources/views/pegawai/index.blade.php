@extends('adminlte::page')
@section('title', 'List Pegawai')
@section('content_header')
<h1 class="m-0 text-dark">List Pegawai</h1>
@stop
@section('content')
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<a href="{{ route('pegawai.create') }}" class="btn btn-primary mb-2">Tambah</a>
<table class="table table-hover table-bordered table-stripped" id="example2">
<thead>
<tr>
<th>No.</th>
<th>Nama Pegawai</th>
<th>NIP</th>
<th>Jabatan</th>
<th>Divisi</th>
<th>Status</th>
<th>Opsi</th>
</tr>
</thead>
<tbody>
@foreach($pegawai as $key => $pegawai)
<tr>
<td>{{ $key + 1 }}</td>
<td>{{ $pegawai->namapegawai }}</td>
<td>{{ $pegawai->nip }}</td>
<td>{{ ucfirst($pegawai->jabatan) }}</td>
<td>{{ ucfirst($pegawai->divisi) }}</td>
<td>{{  $pegawai->status  }}</td>
<td>
<a href="{{ route('pegawai.edit', $pegawai->id) }}"
class="btn btn-primary btn-xs">Edit</a>
<a href="{{ route('pegawai.destroy', $pegawai->id) }}"
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
