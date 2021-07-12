@extends('main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu Manajer</h1>
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
               			<strong>Profil Karyawan</strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
               				<th>Nama Karyawan</th>
                      <th>Alamat</th>
                      <th>No Ponsel</th>
               				<th>Aksi</th>
               			</tr>
               		</thead>
               		<tbody>
                     @foreach ($users as $key => $item)
                    <tr>
                      <td class="text-center">{{ $users->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->name}}</td>
                      <td class="text-center">{{ $item->alamat }}</td>
                      <td class="text-center">{{ $item->no_tlpn }}</td>
                    
                      <td class="text-center">
                        <a href="{{url('user/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil"> Edit Profil</i>
                        </a>
                        <a href="{{url('userk/'.$item->id)}}" class="btn btn-warning btn-sm">
                          <i class="fa fa-eye"> Detail</i>
                        </a>
                      </td>
                      
                    </tr>
                    @endforeach 
                  </tbody>
               </table>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection