@extends('main')

@section('title','EditData | ')

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
               <div class="card">
               	<div class="card-header">
               		<div class="pull-left">
               			<strong>Edit Status Laporan IG</strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('instagram')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-undo"></i> Kembali
               			</a>
               		</div>
               	</div>
               	<div class="card-body ">
               		
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('instagram/'.$instagram->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <table>Nilai Kinerja</table>
                          <input type="text" name="nilaiins" class="form-control @error('nilaiins') is-invalid @enderror" value="{{old('nilaiins')}}">
                          @error('nilaiins')
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