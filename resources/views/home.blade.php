@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
    <h1 class="m-0 text-light">Dashboard</h1>
@stop
@section('content')
<div class="container-fluid">
<div class="row">

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><img src="assets/employee.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Jumlah Pegawai Aktif</span>
<span class="info-box-number">{{$jp}}
</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><img src="assets/to-do.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Total Barang</span>
<span class="info-box-number">{{$tb}}</span>
</div>

</div>

</div>


<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><img src="assets/available.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Total Barang Ready</span>
<span class="info-box-number">{{$tbr}}</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-warning elevation-1"><img src="assets/unboxing.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Total Barang Baik</span>
<span class="info-box-number">{{$tbb}}</span>
</div>

</div>

</div>

<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><img src="assets/laptop-screen.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Total Barang Laptop</span>
<span class="info-box-number">{{$tbl}}</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><img src="assets/bad.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Total Barang Kurang Baik</span>
<span class="info-box-number">{{$tbkb}}
</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><img src="assets/computer.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Total Barang Rusak</span>
<span class="info-box-number">{{$tbru}}</span>
</div>

</div>

</div>




<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-warning elevation-1"><img src="assets/handphone.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Total Barang Handphone</span>
<span class="info-box-number">{{$tbh}}</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><img src="assets/laptop-screen.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Laptop Ready</span>
<span class="info-box-number">{{$tblr}}
</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><img src="assets/laptop-screen.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Laptop Rusak</span>
<span class="info-box-number">{{$tbruLaptop}}</span>
</div>

</div>

</div>


<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><img src="assets/laptop-screen.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Laptop Baik</span>
<span class="info-box-number">{{$tbbLaptop}}</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-warning elevation-1"><img src="assets/laptop-screen.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Laptop Kurang Baik</span>
<span class="info-box-number">{{$tbkblaptop}}</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box">
<span class="info-box-icon bg-info elevation-1"><img src="assets/handphone.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Handphone Ready</span>
<span class="info-box-number">{{$tbhr}}
</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-danger elevation-1"><img src="assets/handphone.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Handphone Baik</span>
<span class="info-box-number">{{$tbbHandphone}}</span>
</div>

</div>

</div>


<div class="clearfix hidden-md-up"></div>
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><img src="assets/handphone.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Handphone Kurang Baik</span>
<span class="info-box-number">{{$tbkbHandphone}}</span>
</div>

</div>

</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-warning elevation-1"><img src="assets/handphone.png" alt="Icon"></span>
<div class="info-box-content">
<span class="info-box-text">Handphone Rusak</span>
<span class="info-box-number">{{$tbruHandphone}}</span>
</div>

</div>

</div>






</div>
</div>
<script>
function printPage() {
window.print();
}
</script>
@stop