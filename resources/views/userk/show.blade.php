@extends('main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Menu Manajer</h1>
                    </div>
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
               			<strong>Detail Profil</strong>
               		</div>
                       <div class="pull-right">
                        <a href="{{ url('userk')}}" class="btn btn-success btn-sm">
                            <i class="fa fa-undo"></i> Kembali
                        </a>
                    </div>
               	</div>
               	<div class="card-body table-responsive">
               		
                        <div class="row">
                            <div class="col-md-8 offset-md-2">

                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{$user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{$user->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>No Ponsel</th>
                                            <td>{{$user->no_tlpn}}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{$user->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <th>Wilayah Samchick</th>
                                            <td>{{$user->cabang->namacbg}}</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>

                    	</div>
               </div>

               
            </div>
        </div>
    </div>
@endsection