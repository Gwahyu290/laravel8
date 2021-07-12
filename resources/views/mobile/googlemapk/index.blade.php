@extends('mobile.main')

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
               			<strong>Tugas Google Views</strong>
               		</div>
                  <div class="pull-right">
                    <a href="{{ url('googlemap/create')}}" class="btn btn-success btn-sm">
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
                      <th>Tugas Google Views</th>
                      <th>Link Google Views</th>
                      <th>Nilai Tugas</th>
                      <th>Action</th>
               			</tr>
               		</thead>
               		<tbody>
                     @foreach ($googlemaps as $key => $item)
                    <tr>
                      <td class="text-center">{{ $googlemaps->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">
                        <a href="{{ asset('map/'. $item->gambargm) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a></td>
                        <td class="text-center">
                          <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">Lihat Tugas</a></td>
                      <td class="text-center">{{ $item->nilaigm}}</td>
                      <td class="text-center">
                        <a href="{{url('googlemapk/'.$item->id.'/delete')}}">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tugas yang dibatalkan tidak dapat dikirim kembali, apakah anda yakin???')">
                                <i class="fa fa-times"> Batalkan Kirim</i>
                            </button></a>
                        </td>
                    </tr>
                    @endforeach 
                  </tbody>
               </table>
               <div class="pull-left">
                 Menampilkan
                 {{$googlemaps->firstItem()}}
                 Sampai
                 {{$googlemaps->lastItem()}}
                 Dari
                 {{$googlemaps->total()}}
                 Data
               </div>
               <div class="pull-right">
               {{ $googlemaps->links()}}
                </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection