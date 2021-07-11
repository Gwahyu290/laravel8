@extends('main')

@section('title','Tambah Data | ')

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
               <div class="card">
               	<div class="card-header">
               		<div class="pull-left">
               			<strong>Tambah WIlayah</strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('cabang')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-undo"></i> Kembali
               			</a>
               		</div>
               	</div>
               	<div class="card-body ">
               		
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('cabang')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <table>Wilayah Samchick</table>
                          <input type="text" name="namacbg" class="form-control @error('namacbg') is-invalid @enderror" value="{{old('namacbg')}}" autofocus>
                          @error('namacbg')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Alamat Samchick</table>
                          <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}" autofocus>
                          @error('alamat')
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