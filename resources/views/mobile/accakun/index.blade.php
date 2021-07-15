@extends('mobile.main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard Admin</h1>
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