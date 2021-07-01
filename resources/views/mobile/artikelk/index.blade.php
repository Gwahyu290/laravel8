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
               			<strong>Tugas Artikel</strong>
               		</div>
                  <div class="pull-right">
                    <a href="{{ url('artikel/create')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Kumpulkan Artikel 
                    </a>
                  </div>
               	</div>
               	<div class="card-body table-responsive">
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
                      <th>Tanggal Laporan</th>
                      <th>Wilayah Samchick</th>
                      <th>Laporan Artikel</th>
                      <th>Nilai Tugas</th>
               			</tr>
               		</thead>
               		<tbody>
                      @foreach ($artikels as $key => $item)
                    <tr>
                      <td class="text-center">{{ $artikels->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">
                      <a href="{{ asset('pdf/'. $item->gambar) }}" target="_blank" rel="noopener noreferrer">Download File</a></td>
                      <td class="text-center">{{ $item->nilaiar }}</td>
                    </tr>
                    @endforeach 
                  </tbody>
               </table>
               <div class="pull-left">
                 Menampilkan
                 {{$artikels->firstItem()}}
                 Sampai
                 {{$artikels->lastItem()}}
                 Dari
                 {{$artikels->total()}}
                 Data
               </div>
               <div class="pull-right">
               {{ $artikels->links()}}
                </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection