@extends('master.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Visitor</span>
              <span class="info-box-number">{{$total_visitor}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Today Visitor</span>
              <span class="info-box-number">{{$total_visitor_today}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Terjawab</span>
              <span class="info-box-number">{{$total_jawaban_membantu}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-times-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tidak Terjawab</span>
              <span class="info-box-number">{{$total_jawaban_tidakpuas}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    <div class="row">
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Total Visitor</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChartTotalVisitor" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Most Wanted Kategori</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive">
                    <canvas id="pieChart" style="height:250px"></canvas>
                  </div>
                </div>
                <div class="col-md-6">
                  <ul class="chart-legend clearfix">
                    
                    @foreach($kategori1 as $kt1)
                    <li><i class="fa fa-circle-o text-red"></i> {{$kt1->kode_departement}} <span>: {{$kt1->a}}</span></li>
                    @endforeach
                    @foreach($kategori2 as $kt2)
                    <li><i class="fa fa-circle-o text-green"></i> {{$kt2->kode_departement}} <span>: {{$kt2->a}}</span></li>
                    @endforeach
                    @foreach($kategori3 as $kt3)
                    <li><i class="fa fa-circle-o text-yellow"></i> {{$kt3->kode_departement}} <span>: {{$kt3->a}}</span></li>
                    @endforeach
                    @foreach($kategori4 as $kt4)
                    <li><i class="fa fa-circle-o text-aqua"></i> {{$kt4->kode_departement}} <span>: {{$kt4->a}}</span></li>
                    @endforeach
                    @foreach($kategori5 as $kt5)
                    <li><i class="fa fa-circle-o text-light-blue"></i> {{$kt5->kode_departement}} <span>: {{$kt5->a}}</span></li>
                    @endforeach
                    @foreach($kategori6 as $kt6)
                    <li><i class="fa fa-circle-o text-gray"></i> {{$kt6->kode_departement}} <span>: {{$kt6->a}}</span></li>
                    @endforeach
                    @foreach($kategori7 as $kt7)
                    <li><i class="fa fa-circle-o text-purple"></i> {{$kt7->kode_departement}} <span>: {{$kt7->a}}</span></li>
                    @endforeach

                  </ul>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->

        <div class="col-md-6">

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Most Wanted Jenis Pertanyaan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="chart-responsive">
                    <canvas id="pieChartJenis" style="height:250px"></canvas>
                  </div>
                </div>
                <div class="col-md-6">
                  <ul class="chart-legend clearfix">
                    
                    @foreach($jenis1 as $jn1)
                    <li><i class="fa fa-circle-o text-red"></i> {{$jn1->sub_kategori}} <span>: {{$jn1->a}}</span></li>
                    @endforeach
                    @foreach($jenis2 as $jn2)
                    <li><i class="fa fa-circle-o text-green"></i> {{$jn2->sub_kategori}} <span>: {{$jn2->a}}</span></li>
                    @endforeach
                    @foreach($jenis3 as $jn3)
                    <li><i class="fa fa-circle-o text-yellow"></i> {{$jn3->sub_kategori}} <span>: {{$jn3->a}}</span></li>
                    @endforeach
                    @foreach($jenis4 as $jn4)
                    <li><i class="fa fa-circle-o text-aqua"></i> {{$jn4->sub_kategori}} <span>: {{$jn4->a}}</span></li>
                    @endforeach
                    @foreach($jenis5 as $jn5)
                    <li><i class="fa fa-circle-o text-light-blue"></i> {{$jn5->sub_kategori}} <span>: {{$jn5->a}}</span></li>
                    @endforeach
                    @foreach($jenis6 as $jn6)
                    <li><i class="fa fa-circle-o text-gray"></i> {{$jn6->sub_kategori}} <span>: {{$jn6->a}}</span></li>
                    @endforeach
                    @foreach($jenis7 as $jn7)
                    <li><i class="fa fa-circle-o text-purple"></i> {{$jn7->sub_kategori}} <span>: {{$jn7->a}}</span></li>
                    @endforeach
                    
                  </ul>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Feedback User</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChartFeedbackUser" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
      </section>
    </div>
    <!-- /.row -->   
    </section>
    <!-- /.content -->
@stop