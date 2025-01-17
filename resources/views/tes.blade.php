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
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#filterModal">
Filter
</button>
<!-- filter -->
@if (strpos(url()->current(),'pdf') == false)
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#downloadModal">
Download
</button>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewModal">
View
</button>
<hr>
@endif
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
@if($barang->count() > 0)
    @foreach($barang as $key => $barangs)
        <tr>
            <td>{{ $barangs->id }}</td>
            <td>{{ $barangs->namabarang }}</td>
            <td>{{ $barangs->tahun }}</td>
            <td>{{ $barangs->jumlahbarang }}</td>
            <td>{{ $barangs->ruang }}</td>
            <td>{{ $barangs->status }}</td>
            <td>{{$barangs->jenisbarang}}</td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="8">No data found</td>
    </tr>
@endif
</tbody>
</table>
</div>
</div>
</div>
</div>

<!-- Filter Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="filterModalLabel">Filter Options</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="GET" action="{{ url('report') }}">
<div class="form-group">
<label for="status">Status:</label>
<select class="form-control" name="status" id="status">
<option value="">Select Status</option>
@foreach ($statuses as $status)
<option value="{{ $status }}">{{ $status }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="ruang">Ruang:</label>
<select class="form-control" name="ruang" id="ruang">
<option value="">Select Ruang</option>
@foreach ($ruangs as $ruang)
<option value="{{ $ruang }}">{{ $ruang }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="jenisbarang">Jenis Barang:</label>
<select class="form-control" name="jenisbarang" id="jenisbarang">
<option value="">Select Jenis Barang</option>
@foreach ($jenisbarangs as $jenisbarang)
<option value="{{ $jenisbarang }}">{{ $jenisbarang }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="kondisi">Kondisi:</label>
<select class="form-control" name="kondisi" id="kondisi">
<option value="">Select Kondisi</option>
@foreach ($kondisis as $kondisi)
<option value="{{ $kondisi }}">{{ $kondisi }}</option>
@endforeach
</select>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-info">Filter</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade" id="downloadModal" tabindex="-1" role="dialog" aria-labelledby="downloadModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="downloadModalLabel">Filter Options</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="GET" action="{{ url('pdf/download') }}">
<div class="form-group">
<label for="status">Status:</label>
<select class="form-control" name="status" id="status">
<option value="">Select Status</option>
@foreach ($statuses as $status)
<option value="{{ $status }}">{{ $status }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="ruang">Ruang:</label>
<select class="form-control" name="ruang" id="ruang">
<option value="">Select Ruang</option>
@foreach ($ruangs as $ruang)
<option value="{{ $ruang }}">{{ $ruang }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="jenisbarang">Jenis Barang:</label>
<select class="form-control" name="jenisbarang" id="jenisbarang">
<option value="">Select Jenis Barang</option>
@foreach ($jenisbarangs as $jenisbarang)
<option value="{{ $jenisbarang }}">{{ $jenisbarang }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="kondisi">Kondisi:</label>
<select class="form-control" name="kondisi" id="kondisi">
<option value="">Select Kondisi</option>
@foreach ($kondisis as $kondisi)
<option value="{{ $kondisi }}">{{ $kondisi }}</option>
@endforeach
</select>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-info">Filter</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="viewModalLabel">Filter Options</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="GET" action="{{ url('pdf/view') }}">
<div class="form-group">
<label for="status">Status:</label>
<select class="form-control" name="status" id="status">
<option value="">Select Status</option>
@foreach ($statuses as $status)
<option value="{{ $status }}">{{ $status }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="ruang">Ruang:</label>
<select class="form-control" name="ruang" id="ruang">
<option value="">Select Ruang</option>
@foreach ($ruangs as $ruang)
<option value="{{ $ruang }}">{{ $ruang }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="jenisbarang">Jenis Barang:</label>
<select class="form-control" name="jenisbarang" id="jenisbarang">
<option value="">Select Jenis Barang</option>
@foreach ($jenisbarangs as $jenisbarang)
<option value="{{ $jenisbarang }}">{{ $jenisbarang }}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="kondisi">Kondisi:</label>
<select class="form-control" name="kondisi" id="kondisi">
<option value="">Select Kondisi</option>
@foreach ($kondisis as $kondisi)
<option value="{{ $kondisi }}">{{ $kondisi }}</option>
@endforeach
</select>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-info">Filter</button>
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</form>
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

function notificationBeforeDelete(event, el) {
event.preventDefault();
if (confirm('Apakah anda yakin akan menghapus data ? ')) {
$("#delete-form").attr('action', $(el).attr('href'));
$("#delete-form").submit();
}
}
</script>
@endpush
