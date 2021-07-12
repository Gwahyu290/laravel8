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
               			<strong>Tugas Instagram</strong>
               		</div>
                  <div class="pull-right">
                    <a href="{{ url('instagram/create')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Kumpulkan Tugas
                    </a>
                  </div>
               	</div>
               	<div class="card-body table-responsive">
                  <form role="form" action="{{ url('instagram')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                             <br><a class="btn btn-danger" href="{{ url('instagram')}}"><i class="fa fa-refresh"> Refresh </i></a>
                            </div>
                    </div>
                    </form>
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
                      <th>Tanggal Laporan</th>
                      <th>Wilayah Samchick</th>
                      <th>Gambar Insatgram</th>
                      <th>Link Instagram</th>
                      <th>Nilai Tugas</th>
                      <th>Action</th>
               			</tr>
               		</thead>
               		<tbody>
                      @foreach ($instagrams as $key => $item)
                    <tr>
                      <td class="text-center">{{ $instagrams->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">
                      <a href="{{ asset('ig/'. $item->gambarig) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a></td>
                      <td class="text-center">
                      <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">Lihat Link</a></td>
                      <td class="text-center">{{ $item->nilaiins}}</td>
                      <td class="text-center">
                      <a href="{{url('instagramk/'.$item->id.'/delete')}}">
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
                 {{$instagrams->firstItem()}}
                 Sampai
                 {{$instagrams->lastItem()}}
                 Dari
                 {{$instagrams->total()}}
                 Data
               </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection