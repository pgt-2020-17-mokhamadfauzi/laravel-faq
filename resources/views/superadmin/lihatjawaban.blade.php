@extends('master.master')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box Pertanyaan -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-body" style="">
                    <h2>{{$artikel->pertanyaan}}</h2>
                    <br>
                    <!-- <div class="box-body box-profile"> -->
                    @php
                    foreach($jawaban as $js){
                    echo $js->jawaban;
                    }
                    @endphp
                    <!-- </div> -->
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box-body text-right" style="margin-left:10px">
                <a href="/superadmin/sudahdijawab" class="btn btn-danger" style="margin-right:5px">Kembali</a><a href="/superadmin/koreksijawaban/{{$artikel->kode_pertanyaan}}" class="btn btn-warning" style="margin-right:5px">Koreksi</a><a href="/superadmin/release/{{$artikel->kode_pertanyaan}}" class="btn btn-success">Terbirkan</a>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@stop