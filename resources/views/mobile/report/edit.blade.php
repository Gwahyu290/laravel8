@extends('main')

@section('title','EditData | ')

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
               <div class="card">
               	<div class="card-header">
               		<div class="pull-left">
               			<strong>Edit Status Report </strong>
               		</div>
               		<div class="pull-right">
               			<a href="{{ url('report')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-undo"></i> Kembali
               			</a>
               		</div>
               	</div>
               	<div class="card-body ">
               		
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('report/'.$report->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                              <table>Status Laporan Harian</table>
                              <select name="slaporan" class="form-control @error('slaporan') is-invalid @enderror" required/>
                                    <option value="">- Pilih -</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Revisi">Revisi</option>
                                </select>
                                @error('slaporan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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