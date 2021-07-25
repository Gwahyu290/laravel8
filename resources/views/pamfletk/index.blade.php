@extends('main')

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
               			<strong>Tugas Share Pamlfet</strong>
               		</div>
                  <div class="pull-right">
                    <a href="{{ url('pamflet/create')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Kumpulkan Pamflet 
                    </a>
                  </div>
               	</div>
               	<div class="card-body table-responsive">
                  <form role="form" action="{{ url('pamflet')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-2 pr-1">
                            <div class="form-group">
                              <label>Tanggal</label>
                              <input type="date" class="form-control"  placeholder="06/02/2021" name="tgl1" >
                            </div>
                    </div>
                    <div class="col-md-1 pr-1">
                            <div class="form-group">
                              <label style="color:white;">,l</label>
                             <br><button class="btn btn-primary" type="submit"><i class="fa fa-search"> Search </i></button>
                            </div>
                    </div>       
                    </form>
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
                      <th>Tanggal Laporan</th>
                      <th>Wilayah Samchick</th>
                      <th>Laporan Share Pamflet</th>
                      <th>Nilai Tugas</th>
                      <th>Predikat</th>
                      <th>Action</th>
               			</tr>
               		</thead>
               		<tbody>
                      @foreach ($pamflets as $key => $item)
                    <tr>
                      <td class="text-center">{{ $pamflets->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">
                      <a href="{{ asset('pam/'. $item->gambar) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar 1,</a>
                      <a href="{{ asset('pam/'. $item->gambar1) }}" target="_blank" rel="noopener noreferrer">Gambar 2</a></td>
                      <td class="text-center">{{ $item->nilaipm }}</td>
                      <td class="text-center">{{ $item->predikat }}</td>
                      <td class="text-center">
                        <a href="{{url('pamfletk/'.$item->id.'/delete')}}">
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