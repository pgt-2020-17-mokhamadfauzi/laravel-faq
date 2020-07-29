@extends('master.master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data User</h3>
                </div>
                <div class="box-body text-right">
                    <button type="button" style="" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Tambah</button>
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
                        <th>Level</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        @php
                        $no = 1;
                        @endphp
                        <tbody>
                        @foreach($user as $su)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$su->name}}</td>
                        <td>{{$su->nip}}</td>
                        <td>{{$su->email}}</td>
                        <td>@if(($su->level) == '1') Super Admin @elseif(($su->level) == '2') Admin @elseif(($su->level) == '3') User @endif</td>
                        <td align="center">@if($su->status == '1') <button class="btn btn-success btn-sm btn-flat">Aktif</button> @elseif($su->status == '0') <button class="btn btn-danger btn-sm btn-flat">Tidak Aktif</button> @endif</td>
                        <td align="center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Aksi</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/superadmin/datauser/detail/{{$su->id}}">Detail</a></li>
                                    <li><a href="/superadmin/datauser/hapus/{{$su->id}}">Hapus</a></li>
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

    <div class="modal fade" id="modal-tambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/datauser/tambahpost" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tambah User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Nama :</label>
                                        <input type="text" class="form-control" name="nama" value="" placeholder="Nama">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">NIP :</label>
                                        <input type="text" class="form-control" name="nip" value="" placeholder="NIP">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">E-Mail :</label>
                                        <input type="email" class="form-control" name="email" value="" placeholder="E-Mail">
                                    </div>
                                    @php
                                    $departement = DB::table('departement')->get();
                                    @endphp
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Departement :</label>
                                        <select class="form-control" name="kode_departement" id="kode_departement">
                                            <option value="" selected="" disabled="">Silahkan Pilih Departement</option>
                                            @foreach($departement as $dpt)
                                            <option value="{{$dpt->kode_departement}}">{{$dpt->nama_departement}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Status :</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="" selected="" disabled="">Silahkan Pilih Status</option>
                                            <option value="1" >Aktif</option>
                                            <option value="0" >Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Level :</label>
                                        <select class="form-control" name="level" id="level">
                                            <option value="" selected="" disabled="">Silahkan Pilih Level</option>
                                            <option value="1" >Super Admin</option>
                                            <option value="2" >Admin</option>
                                            <option value="3" >User</option>
                                        </select>
                                    </div> -->
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Password :</label>
                                        <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>
@stop