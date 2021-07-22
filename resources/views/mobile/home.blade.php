@extends('mobile.main')

@section('content')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        @if (auth()->user()->level=="Admin")
                        <h1>Dashboard Admin</h1>

                        @endif
                        @if (auth()->user()->level=="Karyawan")
                        <h1>Dashboard Karyawan</h1>
                        @endif
                    </div>
                </div>
            </div>			
        </div>
@endsection
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
            @if (auth()->user()->level=="Admin")
                
            	@if (session('status'))
    				<div class="alert alert-success">
        				{{ session('status') }}
    				</div>
			@endif

               <div class="card">
               	<div class="card-header">
               		<div class="pull-left">
               			<strong>Verifikasi Karyawan </strong>
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
                        <th>Telepon</th>
               			<th>Aksi</th>
               			</tr>
               		</thead><tbody>
					@php
					$i= 1;
					@endphp
					@foreach ($data as $key => $item)
								<tr>
									<td class="text-center">{{ $i++ }}</td>
									<td class="text-center">{{ $item->name}}</td>
									<td class="text-center">{{ $item->email}}</td>
									<td class="text-center">{{ $item->alamat}}</td>
									<td class="text-center">{{ $item->no_tlpn}}</td>
									<td>
									<a class="btn btn-warning" data-toggle="modal" data-target="#modal-verify{{$item->id}}">
                          Edit</a>
						  			</td>
								</tr>
					@endforeach 
    				</tbody>	
               </table>


		

               	</div>
               </div>
            </div>
        </div>
		@foreach($data as $data)
	<div class="modal fade" id="modal-verify{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Verifikasi Karyawan {{$data->name}}</h4>
            </div>
            <div class="modal-body">
              <form action="{{url('accakun/'.$data->id)}}" method="post">
                @csrf
                        <div class="card-body"> 
                  <div class="row">
                    <div class="col-md-8 pr-1">
                      <div class="form-group">
                        <label>Pilih Cabang </label>
                        <select class="form-control" name="cabang"  style="height:35px;">
						@php
						$cabang = DB::select("select * from cabangs");
						@endphp
						@foreach ($cabang as $c)
						<option value="{{$c->id}}">{{$c->namacbg}}</option>
						@endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer justify-content-between">
             <button type="submit" class="btn btn-primary" style="float: right;">Verifikasi</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              {{csrf_field()}}
            </div>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>   
@endforeach
    </div>
@endsection
            @endif
            @if (auth()->user()->level=="Karyawan")
               

            <div class="content mt-3">
              <div class="animated fadeIn">
  
                @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
        @endif
        <div class="col-xl-12">
                  <div class="card">
                    <div class="card-header">
                      <div class="pull-left">
                          <strong>Grafik Karyawan Terbaik</strong>
                      </div>
                      <div class="pull-right">
                        <a href="{{ url('kinerja')}}" class="btn btn-success btn-sm">
                          <i class="fa fa-line-chart"></i> Lihat Nilai Saya 
                        </a>
                      </div>
                  </div>
              <form role="form" action="{{ url('home')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-2 pr-1">
                        <div class="form-group">
                          <label>Tahun</label>
                          @php
                          $tahun1 = DB::select("select DISTINCT YEAR(tgl) as tahun from rekap");
                          @endphp
                          <select class="form-control" name="tahun"   style="height:35px;">
                          <option value="">-- Tahun --</option>
                          @foreach ($tahun1 as $t)
                          <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                          @endforeach
                          </select>
                        </div>
                </div>
                <div class="col-md-1 pr-1">
                        <div class="form-group">
                          <label style="color:white;">,l</label>
                         <br><button class="btn btn-primary" type="submit"><i class="fa fa-search"> Search </i></button>
                        </div>
                </div>       
                <div class="col-md-1 pr-1">
                        <div class="form-group">
                          <label style="color:white;">,l</label>
                         <br><a class="btn btn-danger" href="{{ url('home')}}"><i class="fa fa-refresh"> Refresh </i></a>
                        </div>
                </div>
                </form>
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-4">
                                    
                                
                              </div>
                              
                              <h4 class="card-title mb-0">Grafik Karyawan Terbaik Tahun {{$tahun}}</h4>
                              
                              <!--/.col-->
                              <div class="col-sm-8 hidden-sm-down">
                                  <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                      
                                  </div>
                              </div><!--/.col-->
                          </div><!--/.row-->
                          <div >
                              <canvas id="myChart" style="height:250px;" height="250"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var nilai = [<?php foreach ($nilai as $n) { ?>
            '<?php echo $n ?>',
        <?php }?>];
    var nama = [<?php foreach ($nama as $n) { ?>
            '<?php echo $n ?>',
        <?php }?>];
    var barChartData = {
        labels: nama,
        datasets: [{
            label: 'Jumlah Nilai',
            backgroundColor: "pink",
            data: nilai
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("myChart").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                },scales: {
                    yAxes: [{
                        ticks: {
                        beginAtZero:true
                        }
                    }]
                }
            }
        });
    };
</script>
@endsection
            </div>
        </div>
    </div>
            @endif
@endsection