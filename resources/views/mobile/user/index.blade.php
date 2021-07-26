@extends('mobile.main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                  @if (auth()->user()->level=="Admin")  
                  <h1>Menu Manajer</h1>
                  @endif
                  @if (auth()->user()->level=="Karyawan")  
                  <h1>Menu Karyawan</h1>
                  @endif
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
               			<strong>Profil Karyawan</strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
                 <form role="form" action="{{ url('user')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" value="{{Session::get('q')}}" placeholder="Nama Karyawan" name="q" >
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
                       <br><a class="btn btn-danger" href="{{ url('user')}}"><i class="fa fa-refresh"> Refresh </i></a>
                      </div>
              </div>
              </form>
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
               				<th>Nama Karyawan</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Alamat</th>
                      <th>No Ponsel</th>
                      <th>Wilayah Samchick</th>
               				<th>Aksi</th>
               			</tr>
               		</thead>
               		<tbody>
                     @foreach ($users as $key => $item)
                    <tr>
                      <td class="text-center">{{ $users->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->name}}</td>
                      <td class="text-center">{{ $item->email }}</td>
                      <td class="text-center">{{ $item->level }}</td>
                      <td class="text-center">{{ $item->alamat }}</td>
                      <td class="text-center">{{ $item->no_tlpn }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                    
                      <td class="text-center">
                        <a href="{{url('user/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil"> Edit Profil</i>
                        </a>
                        <form action="{{url('user/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Ingin Hapus Data?')">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm">
                              <i class="fa fa-trash"> Delete Akun</i>
                          </button>
                        </form>
                      </td>
                      
                    </tr>
                    @endforeach 
                  </tbody>
               </table>
               <div class="pull-left">
                 Menampilkan
                 {{$users->firstItem()}}
                 Sampai
                 {{$users->lastItem()}}
                 Dari
                 {{$users->total()}}
                 Data
               </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection