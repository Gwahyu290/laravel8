@extends('main')

@section('title','Status Karyawan|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu Dropdown</h1>
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
               			<strong>Status Karyawan</strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('skaryawan/add')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-plus"></i> Tambah Data 
               			</a>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               				<th>No</th>
               				<th>Status Karyawan</th>
               				<th>Aksi</th>
               			</tr>
               		</thead>
               		<tbody>
               			@foreach ($skaryawans as $key => $item)
               			<tr>
               				<td class="text-center">{{ $skaryawans->firstItem()+ $key }}</td>
               				<td class="text-center">{{ $item->status }}</td>
               				<td class="text-center">
               					<a href="{{url('skaryawan/edit/'.$item->id)}}" class="btn btn-primary btn-sm">
               						<i class="fa fa-pencil"> Update</i>
               					</a>
                        <form action="{{url('skaryawan/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Ingin Hapus Data?')">
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
                 {{$skaryawans->firstItem()}}
                 Sampai
                 {{$skaryawans->lastItem()}}
                 Dari
                 {{$skaryawans->total()}}
                 Data
               </div>
               <div class="pull-right">
               {{ $skaryawans->links()}}
                </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection