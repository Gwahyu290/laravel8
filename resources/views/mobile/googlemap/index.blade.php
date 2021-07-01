@extends('mobile.main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu Jobdesk</h1>
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
               			<strong>Laporan Google Views</strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
               				<th>Nama Pelapor</th>
                      <th>Tanggal Laporan</th>
                      <th>Cabang Samchick</th>
                      <th>Laporan Upload Google Views</th>
                      <th>Status Laporan</th>
               				<th>Aksi</th>
               			</tr>
               		</thead>
               		<tbody>
                     @foreach ($googlemaps as $key => $item)
                    <tr>
                      <td class="text-center">{{ $googlemaps->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->nama_id }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">
                      <a href="{{ asset('map/'. $item->gambar) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a></td>
                      <td class="text-center">{{ $item->nilaigm }}</td>
                      <td class="text-center">
                        <a href="{{url('googlemap/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil"> Nilai Tugas</i>
                        </a>
                        <form action="{{url('googlemap/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Ingin Hapus Data?')">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm">
                              <i class="fa fa-trash"> Delete Data</i>
                          </button>
                        </form>
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