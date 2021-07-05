@extends('main')

@section('title','Data Jobdesk|')

@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Karyawan Of The Moon</h1>
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
      <div class="col-xl-13">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title mb-0">Grafik Of TheMoon</h4>
                                <div class="small text-muted">Juni 2021</div>
                            </div>
                            <!--/.col-->
                            <div class="col-sm-8 hidden-sm-down">
                                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                                    
                                </div>
                            </div><!--/.col-->
                        </div><!--/.row-->
                        <div >
                            <canvas id="myChart" style="height:250px;" height="200"></canvas>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <ul>
                            <li>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Februari</div>
                                <strong>80 Ella (80%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li>
                                <div class="text-muted">Maret</div>
                                <strong>80 Ella (80%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">April</div>
                                <strong>80 Ella (80%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Mei</div>
                                <strong>80 Ella (80%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Juni</div>
                                <strong>75 Ella (75%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Juli</div>
                                <strong>90 Ella (90%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Agustus</div>
                                <strong>100 Ella (100%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">September</div>
                                <strong>80 Ella (80%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Oktober</div>
                                <strong>80 Ella (80%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">November</div>
                                <strong>90 Ella (90%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 90%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="hidden-sm-down">
                                <div class="text-muted">Desember</div>
                                <strong>85 Ella (85%)</strong>
                                <div class="progress progress-xs mt-2" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
              <div class="card">
                <div class="card-header">
                  <div class="pull-left">
                    <strong>Total Nilai Karyawan Of The Moon</strong>
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
                }
            }
        });
    };
</script>
@endsection