@extends('main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu Jobdesk</h1>
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
                  <div class="pull-right">
                    <a href="{{ url('report/create')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Tambah Laporan Harian
                    </a>
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
                      <th>Bukti Laporan</th>
                      <th>Status Laporan</th>
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