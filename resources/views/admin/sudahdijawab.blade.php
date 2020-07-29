@extends('master.master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pertanyaan Sudah Dijawab</h3>
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
                        <th>Jawaban</th>
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
                        <td align="center"><a href="/admin/lihatjawaban/{{$pu->kode_pertanyaan}}"><i class="fa fa-eye"></i></a></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">Aksi</button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/admin/sudahdijawab/ubah/{{$pu->kode_pertanyaan}}">Ubah</a></li>
                                    <li><a href="#">Hapus</a></li>
                                </ul>
                            </div>
                        </td>
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