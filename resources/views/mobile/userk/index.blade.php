@extends('mobile.main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    @if (auth()->user()->level=="Admin")  
                    <h1>Menu Manajer</h1>
                    @endif
                    @if (auth()->user()->level=="Karyawan")  
                    <h1>Menu Karyawan</h1>
                    @endif
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
               			<strong>Profil Karyawan</strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
               <div class="row">
                <div class="col-md-8 offset-md-2">

                    <table class="table table-bordered">
                        <tbody>
                          @foreach ($users as $key => $item)
                            <tr>
                                <th>Nama</th>
                                <td>{{$item->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$item->email}}</td>
                            </tr>
                            <tr>
                                <th>No Ponsel</th>
                                <td>{{$item->no_tlpn}}</td>
                            </tr>
                            <tr>
                                <th>Alamat Rumah</th>
                                <td>{{$item->alamat}}</td>
                            </tr>
                            <tr>
                                <th>Wilayah Samchick</th>
                                <td>{{$item->cabang->namacbg}}</td>
                            </tr>
                            <tr>
                                <th>Alamat Samchick</th>
                                <td>{{$item->cabang->alamat}}</td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                    <td class="text-center">
                        <a href="{{url('user/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm">
                          <i class="fa fa-pencil"> Edit Profil</i>
                        </a>
                      </td>
                </div>

          </div>
               	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection