@extends('main')

@section('title','Edit Data | ')

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
               <div class="card">
               	<div class="card-header">
               		<div class="pull-left">
               			<strong>Edit Karyawan</strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('skaryawan')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-undo"></i> Kembali
               			</a>
               		</div>
               	</div>
               	<div class="card-body ">
               		
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('skaryawan/'.$karyawan->id)}}" method="post">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                          <table>Status Karyawan</table>
                          <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status',$karyawan->status)}}">
                          @error('status')
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