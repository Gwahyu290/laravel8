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
               			<strong>Acc Akun </strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">            
               		<table class="table table-bordered">
               		<thead>
               			<tr class="text-center">
               			<th>No</th>
               			<th>Nama Karyawan</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Pilih WIlayah Samchick</th>
               			<th>Aksi</th>
               			</tr>
               		</thead>	
               </table>
               	</div>
               </div>
            </div>
        </div>
    </div>
@endsection