@extends('main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tugas Harian</h1>
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
               			<strong>Tugas Share Facebook</strong>
               		</div>
                  <div class="pull-right">
                    <a href="{{ url('facebook/create')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Kumpulkan Tugas 
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
                      <th>Laporan Upload Facebook</th>
                      <th>Nilai Tugas</th>
               			</tr>
               		</thead>
               		<tbody>
                    @foreach ($facebooks as $key => $item)
                    <tr>
                      <td class="text-center">{{ $facebooks->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">
                      <a href="{{ asset('fb/'. $item->gambar) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a></td>
                      <td class="text-center">{{ $item->nilaifb }}</td>
                    </tr>
                    @endforeach 
                  </tbody>
               </table>
               <div class="pull-left">
                 Menampilkan
                 {{$facebooks->firstItem()}}
                 Sampai
                 {{$facebooks->lastItem()}}
                 Dari
                 {{$facebooks->total()}}
                 Data
               </div>
               <div class="pull-right">
               {{ $facebooks->links()}}
                </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection