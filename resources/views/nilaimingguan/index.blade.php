@extends('main')

@section('title','Data Nilai Karyawan')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Nilai Mingguan</h1>
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
               			<strong>Data Nilai Mingguan</strong>
               		</div>
               		
               	</div>
               	<div class="card-body table-responsive">
                  <form role="form" action="{{ url('nilaimingguan')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" value="{{Session::get('q')}}" placeholder="Nama Karayawan" name="q" >
                      </div>
              </div>
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control"  placeholder="06/02/2021" name="tgl1" >
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
                       <br><a class="btn btn-danger" href="{{ url('nilaimingguan')}}"><i class="fa fa-refresh"> Refresh </i></a>
                      </div>
              </div>
              </form>
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               			<th>No</th>
               		    <th>Nama Karyawan</th>
                      <th>Wilayah Samchick</th>
                      <th>Tanggal</th>
                      <th>Nilai Artikel</th>
                      <th>Nilai Share WhatsApp</th>
                      <th>Nilai Share Pamflet</th>
                      <th>Total Nilai</th>
               			</tr>
               		</thead>
                  <tbody>
                  @php
                  $i = 1;
                  @endphp
                     @foreach ($mingguan as $key => $item)
                    <tr>
                      <td class="text-center">{{ $i++ }}</td>
                      <td class="text-center">{{ $item->name }}</td>
                      <td class="text-center">{{ $item->namacbg }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{$item->ar}}</td>
                      <td class="text-center">{{$item->wa}}</td>
                      <td class="text-center">{{$item->pam}}</td>
                      <td class="text-center">{{ $item->total }}</td>
                      
                    </tr>
                    @endforeach 
                  </tbody>
               </table>
               </div>
            </div>
        </div>
    </div>
@endsection