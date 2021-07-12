@extends('main')

@section('title','EditData | ')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tugas Harian</h1>
                    </div>
                </div>
            </div>      
        </div>
@endsection

@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
               <div class="card">
                <div class="card-header">
                  <div class="pull-left">
                    <strong>Edit Laporan Facebook</strong>
                  </div>
                  <div class="pull-right">
                    <a href="{{ url('facebook')}}" class="btn btn-success btn-sm">
                      <i class="fa fa-undo"></i> Kembali
                    </a>
                  </div>
                </div>
                <div class="card-body ">
                  
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('facebook/'.$facebook->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <table>Nilai Kinerja</table>
                          <input type="text" name="nilaifb" class="form-control @error('nilaifb') is-invalid @enderror" value="{{old('nilaifb')}}">
                          @error('nilaifb')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                      </form>
                    </div>
                  </div>
                </div>
               </div>
            </div>
        </div>
    </div>
@endsection