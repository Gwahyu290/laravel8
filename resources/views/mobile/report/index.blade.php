@extends('main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu Report</h1>
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
                    <strong>Laporan Harian</strong>
                  </div>
                  
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Pelapor</th>
                      <th>Tanggal Laporan</th>
                      <th>Cabang Samchick</th>
                      <th>Laporan Harian</th>
                      <th>Bukti Harian</th>
                      <th>Status Laporan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($reports as $key => $item)
                    <tr>
                      <td class="text-center">{{ $reports->firstItem()+ $key }}</td>
                      <td class="text-center">{{ $item->nama }}</td>
                      <td class="text-center">{{ $item->tgl }}</td>
                      <td class="text-center">{{ $item->cabang->namacbg}}</td>
                      <td class="text-center">{{ $item->hasil }}</td>
                      <td class="text-center">
                      <a href="{{ asset('hasil/'. $item->gambar) }}" target="_blank" rel="noopener noreferrer">Lihat File</a></td>
                      <td class="text-center">{{ $item->slaporan }}</td>
                      <td class="text-center">
                        <a href="{{url('report/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil"> Update</i>
                        </a>
                        <form action="{{url('report/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Ingin Hapus Data?')">
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
                 {{$reports->firstItem()}}
                 Sampai
                 {{$reports->lastItem()}}
                 Dari
                 {{$reports->total()}}
                 Data
               </div>
               <div class="pull-right">
               {{ $reports->links()}}
                </div>
                </div>
               </div>

               
            </div>
        </div>
    </div>
@endsection