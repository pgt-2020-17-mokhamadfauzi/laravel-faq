@extends('master.master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pertanyaan Belum Dijawab</h3>
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
                        <th>Status</th>
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
                        <td align="center">@if($pu->aksi == '1') <button class="btn btn-success btn-sm">New</button> @elseif($pu->aksi == '2') <button class="btn btn-warning btn-sm btn-round">Draft</button> @endif</td>
                        <td align="center"><a href="/admin/jawab/{{$pu->id_pertanyaan_user}}" class="btn btn-info btn-sm">Jawab</a></td>
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