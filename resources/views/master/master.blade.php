<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{url('plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- daterange picker -->
  <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Summer Note -->
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('bower_components/summernote/summernote-bs4.css')}}">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="{{ asset('js/app.js') }}"></script>
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    @include('master.header')
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
      @include('master.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('sweet::alert')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <!-- <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li> -->

      <!-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab"></div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('bower_components/chart.js/Chart.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- DataTables -->
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('bower_components/summernote/summernote-bs4.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{url('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Select2 -->
<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{url('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('yyyy/mm/dd', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      cache: false,
      autoclose: true
    })

    //Date picker
    $('#datepicker1').datepicker({
      cache: false,
      autoclose: true
    })

    //Date picker
    $('#datepicker2').datepicker({
      cache: false,
      autoclose: true
    })

    //Date picker
    $('#datepicker3').datepicker({
      cache: false,
      autoclose: true
    })

    //Date picker
    $('#datepicker4').datepicker({
      cache: false,
      autoclose: true
    })

    //Date picker
    $('#datepicker5').datepicker({
      cache: false,
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<script>
  $(function () {
    $('#example5').DataTable()
    $('#example4').DataTable()
    $('#example3').DataTable()
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<!-- Text Area -->
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

@php

$tahun01 = 0;
$tahun02 = 0;
$tahun03 = 0;
$tahun04 = 0;
$tahun05 = 0;
$tahun06 = 0;
$tahun07 = 0;
$tahun08 = 0;
$tahun09 = 0;
$tahun10 = 0;
$tahun11 = 0;
$tahun12 = 0;

if(!empty($tahun)){
$tahun01 = $tahun.'-01-';
$tahun02 = $tahun.'-02-';
$tahun03 = $tahun.'-03-';
$tahun04 = $tahun.'-04-';
$tahun05 = $tahun.'-05-';
$tahun06 = $tahun.'-06-';
$tahun07 = $tahun.'-07-';
$tahun08 = $tahun.'-08-';
$tahun09 = $tahun.'-09-';
$tahun10 = $tahun.'-10-';
$tahun11 = $tahun.'-11-';
$tahun12 = $tahun.'-12-';
}

$nilai1 = 0;
$nilai2 = 0;
$nilai3 = 0;
$nilai4 = 0;
$nilai5 = 0;
$nilai6 = 0;
$nilai7 = 0;

if(!empty($nilai01)){
  $nilai1 = $nilai01;
  $nilai2 = $nilai02;
  $nilai3 = $nilai03;
  $nilai4 = $nilai04;
  $nilai5 = $nilai05;
  $nilai6 = $nilai06;
  $nilai7 = $nilai07;
}

$nilaijenis1 = 0;
$nilaijenis2 = 0;
$nilaijenis3 = 0;
$nilaijenis4 = 0;
$nilaijenis5 = 0;
$nilaijenis6 = 0;
$nilaijenis7 = 0;

if(!empty($nilaijenis01)){
  $nilaijenis1 = $nilaijenis01;
  $nilaijenis2 = $nilaijenis02;
  $nilaijenis3 = $nilaijenis03;
  $nilaijenis4 = $nilaijenis04;
  $nilaijenis5 = $nilaijenis05;
  $nilaijenis6 = $nilaijenis06;
  $nilaijenis7 = $nilaijenis07;
}

$row01 = array();
$visitor01  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun01%")->get();
foreach($visitor01 as $vs01){
  $row01[] = $vs01;
}
$total_visitor01 = count($row01);

$row02 = array();
$visitor02  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun02%")->get();
foreach($visitor02 as $vs02){
  $row02[] = $vs02;
}
$total_visitor02 = count($row02);

$row03 = array();
$visitor03  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun03%")->get();
foreach($visitor03 as $vs03){
  $row03[] = $vs03;
}
$total_visitor03 = count($row03);

$row04 = array();
$visitor04  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun04%")->get();
foreach($visitor04 as $vs04){
  $row04[] = $vs04;
}
$total_visitor04 = count($row04);

$row05 = array();
$visitor05  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun05%")->get();
foreach($visitor05 as $vs05){
  $row05[] = $vs05;
}
$total_visitor05 = count($row05);

$row06 = array();
$visitor06  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun06%")->get();
foreach($visitor06 as $vs06){
  $row06[] = $vs06;
}
$total_visitor06 = count($row06);

$row07 = array();
$visitor07  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun07%")->get();
foreach($visitor07 as $vs07){
  $row07[] = $vs07;
}
$total_visitor07 = count($row07);

$row08 = array();
$visitor08  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun08%")->get();
foreach($visitor08 as $vs08){
  $row08[] = $vs08;
}
$total_visitor08 = count($row08);

$row09 = array();
$visitor09  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun09%")->get();
foreach($visitor09 as $vs09){
  $row09[] = $vs09;
}
$total_visitor09 = count($row09);

$row10 = array();
$visitor10  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun10%")->get();
foreach($visitor10 as $vs10){
  $row10[] = $vs10;
}
$total_visitor10 = count($row10);

$row11 = array();
$visitor11  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun11%")->get();
foreach($visitor11 as $vs11){
  $row11[] = $vs11;
}
$total_visitor11 = count($row11);

$row12 = array();
$visitor12  = DB::table('log_login')->where('tanggal', 'LIKE', "%$tahun12%")->get();
foreach($visitor12 as $vs12){
  $row12[] = $vs12;
}
$total_visitor12 = count($row12);

$raw001 = array();
$feedback001 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun01%")->where('status', '0')->get();
foreach($feedback001 as $fb001){
  $raw001[] = $fb001;
}
$feedback001 = count($raw001);

$raw101 = array();
$feedback101 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun01%")->where('status', '1')->get();
foreach($feedback101 as $fb101){
  $raw101[] = $fb101;
}
$feedback101 = count($raw101);

$raw002 = array();
$feedback002 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun02%")->where('status', '0')->get();
foreach($feedback002 as $fb002){
  $raw002[] = $fb002;
}
$feedback002 = count($raw002);

$raw102 = array();
$feedback102 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun02%")->where('status', '1')->get();
foreach($feedback102 as $fb102){
  $raw102[] = $fb102;
}
$feedback102 = count($raw102);

$raw003 = array();
$feedback003 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun03%")->where('status', '0')->get();
foreach($feedback003 as $fb003){
  $raw003[] = $fb003;
}
$feedback003 = count($raw003);

$raw103 = array();
$feedback103 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun03%")->where('status', '1')->get();
foreach($feedback103 as $fb103){
  $raw103[] = $fb103;
}
$feedback103 = count($raw103);

$raw004 = array();
$feedback004 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun04%")->where('status', '0')->get();
foreach($feedback004 as $fb004){
  $raw004[] = $fb004;
}
$feedback004 = count($raw004);

$raw104 = array();
$feedback104 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun04%")->where('status', '1')->get();
foreach($feedback104 as $fb104){
  $raw104[] = $fb104;
}
$feedback104 = count($raw104);

$raw005 = array();
$feedback005 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun05%")->where('status', '0')->get();
foreach($feedback005 as $fb005){
  $raw005[] = $fb005;
}
$feedback005 = count($raw005);

$raw105 = array();
$feedback105 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun05%")->where('status', '1')->get();
foreach($feedback105 as $fb105){
  $raw105[] = $fb105;
}
$feedback105 = count($raw105);

$raw006 = array();
$feedback006 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun06%")->where('status', '0')->get();
foreach($feedback006 as $fb006){
  $raw006[] = $fb006;
}
$feedback006 = count($raw006);

$raw106 = array();
$feedback106 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun06%")->where('status', '1')->get();
foreach($feedback106 as $fb106){
  $raw106[] = $fb106;
}
$feedback106 = count($raw106);

$raw007 = array();
$feedback007 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun07%")->where('status', '0')->get();
foreach($feedback007 as $fb007){
  $raw007[] = $fb007;
}
$feedback007 = count($raw007);

$raw107 = array();
$feedback107 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun07%")->where('status', '1')->get();
foreach($feedback107 as $fb107){
  $raw107[] = $fb107;
}
$feedback107 = count($raw107);

$raw008 = array();
$feedback008 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun08%")->where('status', '0')->get();
foreach($feedback008 as $fb008){
  $raw008[] = $fb008;
}
$feedback008 = count($raw008);

$raw108 = array();
$feedback108 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun08%")->where('status', '1')->get();
foreach($feedback108 as $fb108){
  $raw108[] = $fb108;
}
$feedback108 = count($raw108);

$raw009 = array();
$feedback009 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun09%")->where('status', '0')->get();
foreach($feedback009 as $fb009){
  $raw009[] = $fb009;
}
$feedback009 = count($raw009);

$raw109 = array();
$feedback109 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun09%")->where('status', '1')->get();
foreach($feedback109 as $fb109){
  $raw109[] = $fb109;
}
$feedback109 = count($raw109);

$raw010 = array();
$feedback010 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun10%")->where('status', '0')->get();
foreach($feedback010 as $fb010){
  $raw010[] = $fb010;
}
$feedback010 = count($raw010);

$raw110 = array();
$feedback110 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun10%")->where('status', '1')->get();
foreach($feedback110 as $fb110){
  $raw110[] = $fb110;
}
$feedback110 = count($raw110);

$raw011 = array();
$feedback011 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun11%")->where('status', '0')->get();
foreach($feedback011 as $fb011){
  $raw011[] = $fb011;
}
$feedback011 = count($raw011);

$raw111 = array();
$feedback111 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun11%")->where('status', '1')->get();
foreach($feedback111 as $fb111){
  $raw111[] = $fb111;
}
$feedback111 = count($raw111);

$raw012 = array();
$feedback012 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun12%")->where('status', '0')->get();
foreach($feedback012 as $fb012){
  $raw012[] = $fb012;
}
$feedback012 = count($raw012);

$raw112 = array();
$feedback112 = DB::table('log_artikel')->where('tanggal', 'LIKE', "%$tahun12%")->where('status', '1')->get();
foreach($feedback112 as $fb112){
  $raw112[] = $fb112;
}
$feedback112 = count($raw112);

@endphp



<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#pieChartJenis').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

    var totalVisitorChartData = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(209, 79, 65, 1)',
          strokeColor         : 'rgba(209, 79, 65, 1)',
          pointColor          : 'rgba(209, 79, 65, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$total_visitor01}}, {{$total_visitor02}}, {{$total_visitor03}}, {{$total_visitor04}}, {{$total_visitor05}}, {{$total_visitor06}}, {{$total_visitor07}}, {{$total_visitor08}}, {{$total_visitor09}}, {{$total_visitor10}}, {{$total_visitor11}}, {{$total_visitor12}}]
        }
      ]
    }

    var feedbackUserChartData = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Tidak Puas',
          fillColor           : 'rgba(209, 79, 65, 1)',
          strokeColor         : 'rgba(209, 79, 65, 1)',
          pointColor          : 'rgba(209, 79, 65, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$feedback001}}, {{$feedback002}}, {{$feedback003}}, {{$feedback004}}, {{$feedback005}}, {{$feedback006}}, {{$feedback007}}, {{$feedback008}}, {{$feedback009}}, {{$feedback010}}, {{$feedback011}}, {{$feedback012}}]
        },
        {
          label               : 'Puas',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$feedback101}}, {{$feedback102}}, {{$feedback103}}, {{$feedback104}}, {{$feedback105}}, {{$feedback106}}, {{$feedback107}}, {{$feedback108}}, {{$feedback109}}, {{$feedback110}}, {{$feedback111}}, {{$feedback112}}]
        }
      ]
    }

    var areaChartData = {
      labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(209, 79, 65, 1)',
          strokeColor         : 'rgba(209, 79, 65, 1)',
          pointColor          : 'rgba(209, 79, 65, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40, 20, 56, 40, 55, 10]
        },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90, 30, 45, 12, 60, 70]
        }
      ]
    }

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : {{$nilai1}},
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : {{$nilai2}},
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : {{$nilai3}},
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : {{$nilai4}},
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : {{$nilai5}},
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : {{$nilai6}},
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      },
      {
        value    : {{$nilai7}},
        color    : '#8403fc',
        highlight: '#8403fc',
        label    : 'Edge'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChartJenis').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : {{$nilaijenis1}},
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : {{$nilaijenis2}},
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : {{$nilaijenis3}},
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : {{$nilaijenis4}},
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : {{$nilaijenis5}},
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : {{$nilaijenis6}},
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      },
      {
        value    : {{$nilaijenis7}},
        color    : '#8403fc',
        highlight: '#8403fc',
        label    : 'Edge'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChartTotalVisitor').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = totalVisitorChartData
    barChartData.datasets[0].fillColor   = '#00a65a'
    barChartData.datasets[0].strokeColor = '#00a65a'
    barChartData.datasets[0].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChartFeedbackUser').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = feedbackUserChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  
  })
</script>

</body>
</html>

<script>
$(document).ready(function(){
 $('#country_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();  
                    $('#countryList').html(data);
          }
         });
        }
    });
    $(document).on('click', 'li', function(){    
        $('#countryList').fadeOut();  
    }); 

    $(document).on('click', function(){   
        $('#countryList').fadeOut();  
    });   

});
</script>

<script type="text/javascript">
        $(document).ready(function(){

            $("#kode_departement").change(function(){
            var kode_departement = $("#kode_departement").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('fetch.subkategori') }}",
                    data: {kode_departement: kode_departement},
                    cache: false,
                    success: function(data){
                    $("#sub_kategori").html(data);
                    }
                });
            });
        });
</script>
