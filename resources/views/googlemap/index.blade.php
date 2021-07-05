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
               			<strong>Laporan Google Views</strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
                  <form role="form" action="{{ url('googlemap')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" value="{{Session::get('q')}}" placeholder="Nama Karayawan" name="q" >
                      </div>
              </div>
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Dari</label>
                        <input type="date" class="form-control"  placeholder="06/02/2021" name="tgl1" >
                      </div>
              </div>
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Sampai</label>
                        <input type="date" class="form-control"  placeholder="06/02/2021" name="tgl2" >
                      </div>
              </div>
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Urutkan Berdasarkan </label>
                        <select class="form-control" name="orderBy"   style="height:35px;">
                        <option value="">Semua</option>
                        <option value="0">Nilai Terendah</option>
                        <option value="1">Nilai Tertinggi</option>
                        </select>
                      </div>
              </div>
              <div class="col-md-1 pr-1">
                      <div class="form-group">
                        <label style="color:white;">,l</label>
       <br><button class="btn btn-primary" type="submit"><i class="fa fa-search"> Search </i></button>

                      </div>
              </div>       
              <div class="col-md-1 pr-1">
                      <div class="form-group">
                        <label style="color:white;">,l</label>

                       <br><a class="btn btn-danger" href="{{ url('googlemap')}}"><i class="fa fa-refresh"> Refresh </i></a>

                      </div>
              </div>
              </form>
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
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection