@extends('master.master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Variable</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>#</th>
                        <th>Kode Variable</th>
                        <th>Variable</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        @php
                        $no = 1;
                        @endphp
                        <tbody>
                        @foreach($variable as $vb)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$vb->kode_variable}}</td>
                        <td>{{$vb->variable}}</td>
                        <td>@if(($vb->status) == '1') Aktif @elseif(($vb->status) == '0') Tidak Aktif @endif</td>
                        <td align="center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Aksi</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/superadmin/datauser/detail/{{$vb->id_variable}}">Detail</a></li>
                                    <li><a href="/superadmin/datauser/hapus/{{$vb->id_variable}}">Hapus</a></li>
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
</section>
@stop