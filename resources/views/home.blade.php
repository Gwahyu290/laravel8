@extends('main')

@section('content')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        @if (auth()->user()->level=="Admin")
                        <h1>Dashboard Admin</h1>

                        @endif
                        @if (auth()->user()->level=="Karyawan")
                        <h1>Dashboard Karyawan</h1>
                        @endif
                    </div>
                </div>
            </div>			
        </div>
@endsection
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
            @if (auth()->user()->level=="Admin")
                
            	@if (session('status'))
    				<div class="alert alert-success">
        				{{ session('status') }}
    				</div>
			@endif

               <div class="card">
               	<div class="card-header">
               		<div class="pull-left">
               			<strong>Verifikasi Karyawan </strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">            
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               			<th>No</th>
               			<th>Nama Karyawan</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
               			<th>Aksi</th>
               			</tr>
               		</thead><tbody>
					@php
					$i= 1;
					@endphp
					@foreach ($data as $key => $item)
								<tr>
									<td class="text-center">{{ $i++ }}</td>
									<td class="text-center">{{ $item->name}}</td>
									<td class="text-center">{{ $item->email}}</td>
									<td class="text-center">{{ $item->alamat}}</td>
									<td class="text-center">{{ $item->no_tlpn}}</td>
									<td>
									<a class="btn btn-warning" data-toggle="modal" data-target="#modal-verify{{$item->id}}">
                          Edit</a>
						  			</td>
								</tr>
					@endforeach 
    				</tbody>	
               </table>


		

               	</div>
               </div>
            </div>
        </div>
		@foreach($data as $data)
	<div class="modal fade" id="modal-verify{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Verifikasi Karyawan {{$data->name}}</h4>
            </div>
            <div class="modal-body">
              <form action="{{url('accakun/'.$data->id)}}" method="post">
                @csrf
                        <div class="card-body"> 
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Pilih Cabang </label>
                        <select class="form-control" name="cabang"  style="height:35px;">
						@php
						$cabang = DB::select("select * from cabangs");
						@endphp
						@foreach ($cabang as $c)
						<option value="{{$c->id}}">{{$c->namacbg}}</option>
						@endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
             <button type="submit" class="btn btn-primary" style="float: right;">Verifikasi</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              {{csrf_field()}}
            </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>   
@endforeach
    </div>
@endsection
            @endif
            @if (auth()->user()->level=="Karyawan")
               

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
                               <strong>Total Nilai Kinerja</strong>
                           </div>
                       </div>
                       <div class="card-body table-responsive">    
                          <div class="col-md-2 pr-1">
                          <form action="{{url('home')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                                  <div class="form-group">
                                    <label>Bulan</label>
                                    <select class="form-control" name="bulan1"   style="height:35px;">
                                    <option value="">Semua</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Fabruari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                    </select>
                                    </div>
                          </div><div class="col-md-2 pr-1">
                                  <div class="form-group">
                                    @php
                                    $tahun = DB::select("select DISTINCT YEAR(tgl) as tahun from rekap");
                                    @endphp
                                    <label>Tahun</label>
                                    <select class="form-control" name="tahun1"   style="height:35px;">
                                    <option value="">Semua</option>
                                    @foreach ($tahun as $t)
                                    <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                                    @endforeach
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
                                   <br><a class="btn btn-danger" href="{{ url('home')}}"><i class="fa fa-refresh"> Refresh </i></a>
                                  </div>
                          </div>        
                           <table class="table table-bordered">
                           <thead>
                               <tr class="text-center">
                               <th>No</th>
                               <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Nilai Harian</th>
                                <th>Nilai Mingguan</th>
                                <th>Total Nilai</th>
                               </tr>
                           </thead>
                           <tbody>
                           @php
                           $i = 1;
                           @endphp
                           @foreach ($data as $d)
                           <tr>
                           <td>{{$i++}}</td>
                           <td>{{$d->nmbulan}}</td>
                           <td>{{$d->tahun}}</td>
                           <td>{{$d->harian}}</td>
                           <td>{{$d->mingguan}}</td>
                           <td>{{$d->bulanan}}</td>
                           </tr>
                           @endforeach
                           </tbody>	
                   </table>
                       </div>
                   </div>
                </div>
            </div>
            </div>
        </div>
    </div>
            @endif
@endsection