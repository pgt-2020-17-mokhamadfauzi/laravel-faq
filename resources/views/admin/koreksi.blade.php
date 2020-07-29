@extends('master.master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Koreksi Jawaban</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>E-Mail</th>
                        <th>Pertanyaan</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        @php
                        $no = 1;
                        @endphp
                        <tbody>
                        @foreach($pertanyaan_user as $pu)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$pu->nama}}</td>
                        <td>{{$pu->nip}}</td>
                        <td>{{$pu->email}}</td>
                        <td>{{$pu->pertanyaan}}</td>
                        <td align="center"><a href="/admin/koreksijawaban/{{$pu->kode_pertanyaan}}" class="btn btn-primary btn-sm">Koreksi</a></td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop