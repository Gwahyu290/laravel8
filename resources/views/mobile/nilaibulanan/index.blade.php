@extends('mobile.main')

@section('title','Data Nilai Karyawan')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Total Nilai Bulanan</h1>
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
                <form role="form" action="{{ url('nilaibulanan')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" placeholder="Nama Karayawan" name="q" >
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                            <div class="form-group">
                              <label>Bulan</label>
                              <select class="form-control" name="bulan1"   style="height:35px;">
                              <option value="">-- Bulan --</option>
                              <option value="1">Januari</option>
                              <option value="2">Fabruari</option>
                              <option value="3">Maret</option>
                              <option value="4">April</option>
                              <option value="5">Mei</option>
                              <option value="6">Juni</option>
                              <option value="7">Juli</option>
                              <option value="8">Agustus</option>
                              <option value="9">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                              </select>
                              </div>
                    </div><div class="col-md-2 pr-1">
                            <div class="form-group">
                              @php
                              $tahun = DB::select("select DISTINCT YEAR(tgl) as tahun from rekap");
                              @endphp
                              <label>Tahun</label>
                              <select class="form-control" name="tahun1"   style="height:35px;">
                              <option value="">-- Tahun --</option>
                              @foreach ($tahun as $t)
                              <option value="{{$t->tahun}}">{{$t->tahun}}</option>
                              @endforeach
                              </select>
                            </div>
                    </div>
                    <div class="col-md-2 pr-1">
                            <div class="form-group">
                              <label>Sorting Nilai Berdasarkan</label>
                              <select class="form-control" name="orderBy"   style="height:35px;">
                              <option value="">Semua</option>
                              <option value="0">Nilai Terendah</option>
                              <option value="1">Nilai Tertinggi</option>
                              </select>
                            </div>
                    </div>
                    <div class="col-md-1 pr-1">
                            <div class="form-group">
                              <label style="color:white;">,l</label>
                             <br><button class="btn btn-primary" type="submit"><i class="fa fa-search"> Search </i></button>
                            </div>
                    </div>       
                    </form>
          
                <div class="col-xl-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-sm-4">
                                  <h4 class="card-title mb-0">Grafik Nilai Bulanan </h4>
                              </div>
                              <!--/.col-->
                              <div class="col-sm-8 hidden-sm-down">
                                  <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                      
                                  </div>
                              </div><!--/.col-->
                          </div><!--/.row-->
                          <div >
                              <canvas id="myChart" style="height:250px;" height="230"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
               	<!-- <div class="card-header">
               		<div class="pull-left">
               			<strong>Data Nilai Bulanan</strong>
               		</div>
               	</div>
               	<div class="card-body table-responsive">
                    <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Bulan</th>
                        <th>Total Nilai Harian</th>
                        <th>Total Nilai Mingguan</th>
                        <th>Total Nilai Bulanan</th>
                      </tr>
                    </thead>
                    @php
                    $i = 1;
                    @endphp
                    <tbody>
                    @foreach ($best as $b)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$b->nama_id}}</td>
                    <td>{{$b->bulan}} - {{$b->tahun}}</td>
                    <td>{{$b->harian}}</td>
                    <td>{{$b->mingguan}}</td>
                    <td>{{$b->bulanan}}</td>
                    <tr>
                    @endforeach
                    </tbody>
                 </table>
                 </div>
                 --> 
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var year = [<?php foreach ($best as $key) { ?>
            '<?php echo $key->nama_id ?>',
        <?php }?>];
    var nilai = [<?php foreach ($best as $key) { ?>
            '<?php echo $key->bulanan ?>',
        <?php }?>];
    var barChartData = {
        labels: year,
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