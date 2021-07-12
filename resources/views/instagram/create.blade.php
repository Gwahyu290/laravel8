@extends('main')

@section('title','CreateData | ')

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
               			<strong>Pengumpulan Tugas Instagram</strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('instagramk')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-undo"></i> Kembali
               			</a>
               		</div>
               	</div>
               	<div class="card-body ">
               		
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('instagramk')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <table>Nama Pelapor</table>
                          <input disabled type="text" name="nama_id" class="form-control @error('nama_id') is-invalid @enderror" value="{{Auth()->user()->name}}" autofocus>
                          @error('nama_id')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Tanggal Laporan</table>
                          <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror" value="{{old('tgl')}}" autofocus>
                          @error('tgl')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Link Pengumpulan Tugas 1</table>
                          <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{old('link')}}" autofocus>
                          @error('link')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Gambar Tugas 1</table>
                          <input type="file" name="gambarig" class="form-control @error('gambarig') is-invalid @enderror" value="{{old('gambarig')}}" autofocus>
                          @error('gambarig')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Link Pengumpulan Tugas 2</table>
                          <input type="text" name="link1" class="form-control @error('link1') is-invalid @enderror" value="{{old('link1')}}" autofocus>
                          @error('link1')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Gambar Tugas 2</table>
                          <input type="file" name="gambarig1" class="form-control @error('gambarig1') is-invalid @enderror" value="{{old('gambarig1')}}" autofocus>
                          @error('gambarig1')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Link Pengumpulan Tugas 3</table>
                          <input type="text" name="link2" class="form-control @error('link2') is-invalid @enderror" value="{{old('link2')}}" autofocus>
                          @error('link2')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Gambar Tugas 3</table>
                          <input type="file" name="gambarig2" class="form-control @error('gambarig2') is-invalid @enderror" value="{{old('gambarig2')}}" autofocus>
                          @error('gambarig2')
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