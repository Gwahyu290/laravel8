@extends('main')

@section('title','EditData | ')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Tugas Mingguan</h1>
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
               			<strong>Nilai Tugas WhatsApp</strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('whatsapp')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-undo"></i> Kembali
               			</a>
               		</div>
               	</div>
               	<div class="card-body ">
               		
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('whatsapp/'.$whatsapp->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <table>Nilai Kinerja</table>
                          <input type="text" name="nilaiwa" class="form-control @error('nialwa') is-invalid @enderror" value="{{old('nilaiwa')}}">
                          @error('nilaiwa')
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