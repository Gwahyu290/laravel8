@extends('mobile.main')

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
            Dasboard Admin

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
                                  <div class="form-group">
                                    <label>Bulan</label>
                                    <select class="form-control" name="bulan1"   style="height:35px;">
                                    <option value="">-- Bulan --</option>
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
                                    <option value="">-- Tahun --</option>
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
                                   <br><a class="btn btn-danger" href="{{ url('nilaibulanan')}}"><i class="fa fa-refresh"> Refresh </i></a>
                                  </div>
                          </div>        
                           <table class="table table-bordered">
                           <thead>
                               <tr class="text-center">
                               <th>No</th>
                               <th>Nama Karyawan</th>
                                <th>Alamat</th>
                                <th>Nilai Harian</th>
                                <th>Nilai Mingguan</th>
                                <th>Totoal Nilai</th>
                               </tr>
                           </thead>	
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