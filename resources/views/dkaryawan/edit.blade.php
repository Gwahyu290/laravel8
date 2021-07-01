@extends('main')

@section('title','EditData | ')

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
               			<a href="{{ url('dkaryawan')}}" class="btn btn-success btn-sm">
               				<i class="fa fa-undo"></i> Kembali
               			</a>
               		</div>
               	</div>
               	<div class="card-body ">
               		
                  <div class="row">
                    <div class="col-md-4 offset-md-4">
                      <form action="{{url('dkaryawan/'.$dkaryawan->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <table>Nama Karyawan</table>
                          <input disabled type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{old('nama', $dkaryawan->nama)}}">
                          @error('nama')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Alamat Karyawan Textarea</table>
                          <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat', $dkaryawan->alamat)}}">
                          @error('alamat')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <table>Nomor ponsel Karyawan</table>
                          <input type="text" name="no_tlpn" class="form-control @error('no_tlpn') is-invalid @enderror" value="{{old('no_tlpn', $dkaryawan->no_tlpn)}}">
                          @error('no_tlpn')
                          <div class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label>Wilayah Samchick</label>
                            <select disabled name="cabang_id" class="form-control @error('cabang_id') is-invalid @enderror">
                                <option value="">- Pilih -</option>
                                @foreach ($cabangs as $item)
                                    <option value="{{ $item->id }}" {{ old('cabang_id', $dkaryawan->cabang_id) == $item->id ? 'selected' : null }}>{{ $item->namacbg }}</option>
                                @endforeach
                            </select>
                            @error('cabang_id')
                            <div class="invalid-feedback">{{ $message }}</div>
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