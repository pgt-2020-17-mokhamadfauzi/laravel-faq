@extends('master.master')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{url('dist/img/user2-160x160.jpg')}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{Session::get('nama')}}</h3>
                @php
                    $dpt = Session::get('kode_dpt');
                    $departement = DB::table('departement')->where('kode_departement',$dpt)->first();
                    $level = Session::get('level');
                @endphp
              <p class="text-muted text-center">{{Session::get('nip')}}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Departement</b> <p class="pull-right">{{$departement->nama_departement}}</p>
                </li>
                <li class="list-group-item">
                  <b>E-Mail</b> <p class="pull-right">{{Session::get('email')}}</p>
                </li>
                <li class="list-group-item">
                  <b>Level</b> <p class="pull-right">@if($level == '3')User @elseif($level == '2')Admin @elseif($level == '1')Super Admin @endif</p>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
@stop