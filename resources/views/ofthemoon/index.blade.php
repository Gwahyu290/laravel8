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
      <div class="col-xl-12">
                <div class="card">
                    <form role="form" action="{{ url('ofthemoon')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Dari</label>
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
                        @php
                        $tahun = DB::select("select DISTINCT YEAR(tgl) as tahun from rekap");
                        @endphp
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
                        <label>Sampai</label>
                        <select class="form-control" name="bulan2"   style="height:35px;">
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
                        <select class="form-control" name="tahun2"   style="height:35px;">
                        <option value="">-- Tahun --</option>
                        @foreach ($tahun as $t)
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
                            <canvas id="myChart" style="height:250px;" height="160"></canvas>
                        </div>
                    </div>
                    
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