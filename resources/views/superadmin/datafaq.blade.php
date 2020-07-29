@extends('master.master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data FAQ</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>#</th>
                        <th>Pertanyaan</th>
                        <th>Departement</th>
                        <th>Sub Kategori</th>
                        <th>Kode Pertanyaan</th>
                        <th>Status</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        @php
                        $no = 1;
                        @endphp
                        <tbody>
                        @foreach($pertanyaan as $pu)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$pu->pertanyaan}}</td>
                        <td>{{$pu->kode_departement}}</td>
                        <td>{{$pu->sub_kategori}}</td>
                        <td>{{$pu->kode_pertanyaan}}</td>
                        <td align="center">@if($pu->aksi == '4') <button class="btn btn-success btn-sm btn-flat">Aktif</button> @elseif($pu->aksi == '5') <button class="btn btn-danger btn-sm btn-flat">Tidak Aktif</button> @endif</td>
                        <td align="center">
                            <a href="/superadmin/datafaq/detail/{{$pu->kode_pertanyaan}}"><i class="fa fa-eye"></i></a>
                        </td>
                        <td align="center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">Aksi</button>
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/superadmin/datafaq/{{$pu->kode_pertanyaan}}">Detail</a></li>
                                    <li><a href="#">Hapus</a></li>
                                </ul>
                            </div>
                            <!-- <a href="/superadmin/lihatjawaban/{{$pu->kode_pertanyaan}}"><i class="fa fa-eye"></i></a> -->
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