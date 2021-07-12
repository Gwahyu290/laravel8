@extends('mobile.main')

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
      <div class="col-xl-12">
                <div class="card">
            <form role="form" action="{{ url('ofthemoon')}}" method="post" enctype="multipart/form-data">
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
                       <br><a class="btn btn-danger" href="{{ url('ofthemoon')}}"><i class="fa fa-refresh"> Refresh </i></a>
                      </div>
              </div>
              </form>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="card-title mb-0">Grafik of The Month {{$tahun}}</h4>
                            </div>
                            
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