@extends('master.master')
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Setting Menu</h3>
                </div>
                <div class="box-body text-right">
                    <!-- <button type="button" style="" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Tambah</button> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>#</th>
                        <th>Group Menu</th>
                        <th>Pengguna</th>
                        <th>Menu</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td>1</td>
                        <td>{{$menu1->nama_group_menu}}</td>
                        <td align="center"><button type="button" style="" class="" data-toggle="modal" data-target="#modal-pengguna1"><i class="fa fa-eye"></i></button></td>
                        <td align="center"><button type="button" style="" class="" data-toggle="modal" data-target="#modal-menu1"><i class="fa fa-eye"></i></button></td>
                        <td align="center">
                            <button type="button" style="" class="btn btn-primary" data-toggle="modal" data-target="#modal-detailmenu1">Detail</button>
                        </td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>{{$menu2->nama_group_menu}}</td>
                        <td align="center"><button type="button" style="" class="" data-toggle="modal" data-target="#modal-pengguna2"><i class="fa fa-eye"></i></button></td>
                        <td align="center"><button type="button" style="" class="" data-toggle="modal" data-target="#modal-menu2"><i class="fa fa-eye"></i></button></td>
                        <td align="center">
                            <button type="button" style="" class="btn btn-primary" data-toggle="modal" data-target="#modal-detailmenu2">Detail</i></button>
                        </td>
                        </tr>
                        <tr>
                        <td>3</td>
                        <td>{{$menu3->nama_group_menu}}</td>
                        <td align="center"><button type="button" style="" class="" data-toggle="modal" data-target="#modal-pengguna3"><i class="fa fa-eye"></i></button></td>
                        <td></td>
                        <td align="center">
                            <button type="button" style="" class="btn btn-primary" data-toggle="modal" data-target="#modal-detailmenu3">Detail</button>
                        </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <div class="modal fade" id="modal-menu1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/settingmenu/menu1post" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Setting Menu Super Admin</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    @php
                                    $fitur01 = DB::table('fitur')->where('level', $menu1->id_group_menu)->where('kode_fitur','fitur-01')->first();
                                    @endphp
                                    <input type="hidden" name="id_fitur01" value="{{$fitur01->id_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Menu :</label>
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$fitur01->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label for="exampleInputEmail1">Status :</label>
                                        <select class="form-control" name="status01" id="status01">
                                            <option value="1" @if(($fitur01->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($fitur01->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label for="exampleInputEmail1">Level Akses :</label>
                                        <select class="form-control" name="hak_akses01" id="hak_akses01">
                                            <option value="1" @if(($fitur01->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($fitur01->hak_akses) == '2') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                    @php
                                    $fitur02 = DB::table('fitur')->where('level', $menu1->id_group_menu)->where('kode_fitur','fitur-02')->first();
                                    @endphp
                                    <input type="hidden" name="id_fitur02" value="{{$fitur02->id_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$fitur02->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="status02" id="status02">
                                            <option value="1" @if(($fitur02->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($fitur02->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="hak_akses02" id="hak_akses02">
                                            <option value="1" @if(($fitur02->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($fitur02->hak_akses) == '2') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                    @php
                                    $fitur03 = DB::table('fitur')->where('level', $menu1->id_group_menu)->where('kode_fitur','fitur-03')->first();
                                    @endphp
                                    <input type="hidden" name="id_fitur03" value="{{$fitur03->id_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$fitur03->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="status03" id="status03">
                                            <option value="1" @if(($fitur03->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($fitur03->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="hak_akses03" id="hak_akses03">
                                            <option value="1" @if(($fitur03->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($fitur03->hak_akses) == '2') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                    @php
                                    $fitur04 = DB::table('fitur')->where('level', $menu1->id_group_menu)->where('kode_fitur','fitur-04')->first();
                                    @endphp
                                    <input type="hidden" name="id_fitur04" value="{{$fitur04->id_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$fitur04->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="status04" id="status04">
                                            <option value="1" @if(($fitur04->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($fitur04->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="hak_akses04" id="hak_akses04">
                                            <option value="1" @if(($fitur04->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($fitur04->hak_akses) == '2') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                    @php
                                    $fitur05 = DB::table('fitur')->where('level', $menu1->id_group_menu)->where('kode_fitur','fitur-05')->first();
                                    @endphp
                                    <input type="hidden" name="id_fitur05" value="{{$fitur05->id_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$fitur05->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="status05" id="status05">
                                            <option value="1" @if(($fitur05->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($fitur05->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="hak_akses05" id="hak_akses05">
                                            <option value="1" @if(($fitur05->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($fitur05->hak_akses) == '2') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-menu2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/settingmenu/menu2post" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Setting Menu Super Admin</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    @php
                                    $fitur02 = DB::table('fitur')->where('level', $menu2->id_group_menu)->where('kode_fitur','fitur-02')->first();
                                    @endphp
                                    <input type="hidden" name="id_fitur02" value="{{$fitur02->id_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Menu :</label>
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$fitur02->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Status :</label>
                                        <select class="form-control" name="status0" id="status0">
                                            <option value="1" @if(($fitur02->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($fitur02->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    @php
                                    $subfitur01 = DB::table('user_sub_fitur')->where('level', $menu2->id_group_menu)->where('kode_fitur', $fitur02->kode_fitur)->where('id_user_sub_fitur','3')->first();
                                    @endphp
                                    <input type="hidden" name="id_user_sub_fitur01" value="{{$subfitur01->id_user_sub_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Sub Menu :</label>
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$subfitur01->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label for="exampleInputEmail1">Status :</label>
                                        <select class="form-control" name="status01" id="status01">
                                            <option value="1" @if(($subfitur01->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($subfitur01->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <label for="exampleInputEmail1">Level Akses :</label>
                                        <select class="form-control" name="hak_akses01" id="hak_akses01">
                                            <option value="1" @if(($subfitur01->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($subfitur01->hak_akses) == '0') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                    @php
                                    $subfitur02 = DB::table('user_sub_fitur')->where('level', $menu2->id_group_menu)->where('kode_fitur', $fitur02->kode_fitur)->where('id_user_sub_fitur','4')->first();
                                    @endphp
                                    <input type="hidden" name="id_user_sub_fitur02" value="{{$subfitur02->id_user_sub_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$subfitur02->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="status02" id="status02">
                                            <option value="1" @if(($subfitur02->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($subfitur02->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="hak_akses02" id="hak_akses02">
                                            <option value="1" @if(($subfitur02->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($subfitur02->hak_akses) == '0') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                    @php
                                    $subfitur03 = DB::table('user_sub_fitur')->where('level', $menu2->id_group_menu)->where('kode_fitur', $fitur02->kode_fitur)->where('id_user_sub_fitur','5')->first();
                                    @endphp
                                    <input type="hidden" name="id_user_sub_fitur03" value="{{$subfitur03->id_user_sub_fitur}}">
                                    <div class="form-group col-xs-6">
                                        <input type="text" class="form-control" name="nama_fitur" value="{{$subfitur03->nama_fitur}}" readonly>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="status03" id="status03">
                                            <option value="1" @if(($subfitur03->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($subfitur03->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-3">
                                        <select class="form-control" name="hak_akses03" id="hak_akses03">
                                            <option value="1" @if(($subfitur03->hak_akses) == '1') echo selected @endif>Read</option>
                                            <option value="2" @if(($subfitur03->hak_akses) == '0') echo selected @endif>Delete</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal Admin -->

        <!-- Modal Detail Super Admin -->
        <div class="modal fade" id="modal-detailmenu1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/dataadmin/tambahpost" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Detail Group Menu</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputEmail1">Nama Group Menu :</label>
                                        <input type="text" class="form-control" name="nama_group_menu" value="{{$menu1->nama_group_menu}}" placeholder="Nama">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal detail Super Admin -->

        <!-- Modal Detail Super Admin -->
        <div class="modal fade" id="modal-detailmenu2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/dataadmin/tambahpost" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Detail Group Menu</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputEmail1">Nama Group Menu :</label>
                                        <input type="text" class="form-control" name="nama_group_menu" value="{{$menu2->nama_group_menu}}" placeholder="Nama">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal detail Super Admin -->

        <!-- Modal Detail User -->
        <div class="modal fade" id="modal-detailmenu3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/dataadmin/tambahpost" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Detail Group Menu</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputEmail1">Nama Group Menu :</label>
                                        <input type="text" class="form-control" name="nama_group_menu" value="{{$menu3->nama_group_menu}}" placeholder="Nama">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal detail Super Admin -->

        <!-- Modal Pengguna Super Admin -->
        <div class="modal fade" id="modal-pengguna1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/dataadmin/tambahpost" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Pengguna Super Admin</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Departement</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                @php
                                                $no = 1;
                                                $superadmin = DB::table('model_users')->where('level', $menu1->id_group_menu)->get();
                                                @endphp
                                                <tbody>
                                                @foreach($superadmin as $sa)
                                                <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$sa->name}}</td>
                                                <td>{{$sa->nip}}</td>
                                                <td>{{$sa->kode_departement}}</td>
                                                <td>@if (($sa->status_menu) == '0')<button class="btn btn-danger btn-sm">Tidak Aktif</button> @elseif(($sa->status_menu) == '1')<button class="btn btn-success btn-sm">Aktif</button> @endif</td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm">Aksi</button>
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="/superadmin/settingadmin/penggunaaktif01/{{$sa->id}}">Aktifkan</a></li>
                                                            <li><a href="/superadmin/settingadmin/penggunatidakaktif01/{{$sa->id}}">Non Aktifkan</a></li>
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
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal detail Super Admin -->

        <!-- Modal Pengguna Admin -->
        <div class="modal fade" id="modal-pengguna2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/dataadmin/tambahpost" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Pengguna Admin</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <div class="box-body"> -->
                                <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example4" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Departement</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                @php
                                                $no = 1;
                                                $admin = DB::table('model_users')->where('level', $menu2->id_group_menu)->get();
                                                @endphp
                                                <tbody>
                                                @foreach($admin as $sa)
                                                <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$sa->name}}</td>
                                                <td>{{$sa->nip}}</td>
                                                <td>{{$sa->kode_departement}}</td>
                                                <td>@if (($sa->status_menu) == '0')<button class="btn btn-danger btn-sm">Tidak Aktif</button> @elseif(($sa->status_menu) == '1')<button class="btn btn-success btn-sm">Aktif</button> @endif</td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm">Aksi</button>
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="/superadmin/settingadmin/penggunaaktif01/{{$sa->id}}">Aktifkan</a></li>
                                                            <li><a href="/superadmin/settingadmin/penggunatidakaktif01/{{$sa->id}}">Non Aktifkan</a></li>
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
                            <!-- </div> -->
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal detail Admin -->

        <!-- Modal Pengguna User -->
        <div class="modal fade" id="modal-pengguna3">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/dataadmin/tambahpost" method="post">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Pengguna User</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <div class="box-body"> -->
                                <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <table id="example5" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Departement</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                </tr>
                                                </thead>
                                                @php
                                                $no = 1;
                                                $user = DB::table('model_users')->where('level', $menu3->id_group_menu)->get();
                                                @endphp
                                                <tbody>
                                                @foreach($user as $sa)
                                                <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$sa->name}}</td>
                                                <td>{{$sa->nip}}</td>
                                                <td>{{$sa->kode_departement}}</td>
                                                <td>@if (($sa->status_menu) == '0')<button class="btn btn-danger btn-sm">Tidak Aktif</button> @elseif(($sa->status_menu) == '1')<button class="btn btn-success btn-sm">Aktif</button> @endif</td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Aksi
                                                        <!-- <button type="button" class="btn btn-primary btn-sm dropdown-toggle" > -->
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="/superadmin/settingadmin/penggunaaktif01/{{$sa->id}}">Aktifkan</a></li>
                                                            <li><a href="/superadmin/settingadmin/penggunatidakaktif01/{{$sa->id}}">Non Aktifkan</a></li>
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
                            <!-- </div> -->
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Simpan</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal detail Super Admin -->

</section>
@stop