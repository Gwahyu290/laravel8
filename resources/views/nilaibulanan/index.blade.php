@extends('main')

@section('title','Data Nilai Karyawan')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Total Nilai Bulanan</h1>
                    </div>
                </div>
            </div>			
        </div>
@endsection

@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">

            	@if (session('status'))
    				<div class="alert alert-success">
        				{{ session('status') }}
    				</div>
			@endif

               <div class="card">
               	<div class="card-header">
               		<div class="pull-left">
               			<strong>Data Nilai Bulanan</strong>
               		</div>
               		
               	</div>
               	<div class="card-body table-responsive">
                    <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Bulan</th>
                        <th>Total Nilai Harian</th>
                        <th>Total Nilai Mingguan</th>
                        <th>Total Nilai Bulanan</th>
                      </tr>
                    </thead>
                    @php
                    $i = 1;
                    @endphp
                    <tbody>
                    @foreach ($best as $b)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$b->nama_id}}</td>
                    <td>{{$b->bulan}} - {{$b->tahun}}</td>
                    <td>{{$b->harian}}</td>
                    <td>{{$b->mingguan}}</td>
                    <td>{{$b->bulanan}}</td>
                    <tr>
                    @endforeach
                    </tbody>
                 </table>
                 </div>
                 
            </div>
        </div>
    </div>
@endsection