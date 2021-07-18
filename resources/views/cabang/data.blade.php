@extends('main')

@section('title','Status Karyawan|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu Admin</h1>
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
               			<strong>Wilayah Samchick</strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('cabang/add')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-plus"></i> Tambah Data 
               			</a>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
               				<th>Wilayah Samchick</th>
							<th>Alamat</th>
               				<th>Aksi</th>
               			</tr>
               		</thead>
               		<tbody>
               			@foreach ($cabangs as $key => $item)
               			<tr>
               				<td class="text-center">{{ $cabangs->firstItem()+ $key }}</td>
               				<td class="text-center">{{ $item->namacbg }}</td>
							<!--  -->
               				<td class="text-center">
               					<a href="{{url('cabang/edit/'.$item->id)}}" class="btn btn-warning btn-sm">
               						<i class="fa fa-pencil"> Update</i>
               					</a>
                        <form action="{{url('cabang/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Ingin Hapus Data?')">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger btn-sm">
                              <i class="fa fa-trash"> Delete</i>
                          </button>
                        </form>
               				</td>
               			</tr>
               			@endforeach
               		</tbody>
               </table>
               <div class="pull-left">
                 Menampilkan
                 {{$cabangs->firstItem()}}
                 Sampai
                 {{$cabangs->lastItem()}}
                 Dari
                 {{$cabangs->total()}}
                 Data
               </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection