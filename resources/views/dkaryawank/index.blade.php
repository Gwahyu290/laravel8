@extends('main')

@section('title','Data Karyawan|')

@section('breadcrumbs')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Menu Karyawan</h1>
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
              <th>Email</th>
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
              <td class="text-center">{{ $item->name }}</td>
              <td class="text-center">{{ $item->email }}</td>
              <td class="text-center">{{ $item->alamat }}</td>
              <td class="text-center">{{ $item->no_tlpn }}</td>
              <td class="text-center">{{ $item->cabang->namacbg}}</td>
              <td class="text-center">
                <a href="{{url('dkaryawan/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                  <i class="fa fa-pencil"> Update</i>
                </a>
              </td>
            </tr>
            @endforeach 
          </tbody>
        </table>
        <div>
          <div class="pull-left">
            Menampilkan
            {{$users->firstItem()}}
            Sampai
            {{$users->lastItem()}}
            Dari
            {{$users->total()}}
            Data
          </div>
          <div class="pull-right">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection