@extends('mobile.main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tugas Mingguan</h1>
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
               			<strong>Tugas Pamflet</strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
                 
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
               				<th>Nama Pelapor</th>
                      <th>Tanggal Laporan</th>
                      <th>WIlayah Samchick</th>
                      <th>Gambar Tugas Pamflet</th>
                      <th>Nilai Laporan</th>
               				<th>Aksi</th>
               			</tr>
               		</thead>
               		<tbody>
                     @foreach ($pamflets as $key => $item)
                    <tr>
                      <td class="text-center">{{ $pamflets->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->nama_id }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">
                        <a href="{{ asset('pam/'. $item->gambar) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar 1,</a>
                        <a href="{{ asset('pam/'. $item->gambar1) }}" target="_blank" rel="noopener noreferrer">Gambar 2</a></td>
                      <td class="text-center">{{ $item->nilaipm }}</td>
                      <td class="text-center">
                        <a href="{{url('pamflet/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil"> Nilai Tugas</i>
                        </a>
                       
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
               </table>
               <div class="pull-left">
                 Menampilkan
                 {{$pamflets->firstItem()}}
                 Sampai
                 {{$pamflets->lastItem()}}
                 Dari
                 {{$pamflets->total()}}
                 Data
               </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection