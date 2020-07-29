@extends('master.master')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Detail User</h3>
                </div>
                <form action="/admin/jawabpost" method="post">
                    {{ csrf_field() }}
                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="body">
                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Nama :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$user->name}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">NIP :</label>
                                    <input type="text" class="form-control" name="nip" value="{{$user->nip}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Departement :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$user->kode_departement}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">E-Mail :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$user->email}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Level :</label>
                                    <input type="text" class="form-control" name="nama" value="@if(($user->level) == '3')User @endif" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Status :</label>
                                    <input type="text" class="form-control" name="nama" value="@if(($user->status) == '1')Aktif @elseif(($user->status) == '0')Tidak Aktif @endif" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Password :</label>
                                    <button type="button" style="" class="btn btn-primary form-control" data-toggle="modal" data-target="#modal-ubahpassword">Ubah Password</button>
                                </div>
                            </div>
                        </div>
                        <div class="box-body text-right" style="margin-top:10px">
                            <a href="/superadmin/datauser" class="btn btn-danger" style="margin-right:5px">Kembali</a><button type="button" style="" class="btn btn-success" data-toggle="modal" data-target="#modal-ubah">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-ubah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/detail/ubahpost" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Data User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Nama :</label>
                                        <input type="text" class="form-control" name="nama" value="{{$user->name}}" placeholder="Nama">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">NIP :</label>
                                        <input type="text" class="form-control" name="nip" value="{{$user->nip}}" placeholder="Nama">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">E-Mail :</label>
                                        <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Nama">
                                    </div>
                                    @php
                                    $departement = DB::table('departement')->get();
                                    @endphp
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Departement :</label>
                                        <select class="form-control" name="kode_departement" id="kode_departement">
                                            <option value="" selected="" disabled="">Silahkan Pilih Departement</option>
                                            @foreach($departement as $dpt)
                                            <option value="{{$dpt->kode_departement}}" @if(($user->kode_departement) == $dpt->kode_departement) echo selected @endif>{{$dpt->nama_departement}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Status :</label>
                                        <select class="form-control dynamic" name="status" id="status">
                                            <option value="" selected="" disabled="">Silahkan Pilih Status</option>
                                            <option value="1" @if(($user->status) == '1') echo selected @endif>Aktif</option>
                                            <option value="0" @if(($user->status) == '0') echo selected @endif>Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Level :</label>
                                        <select class="form-control dynamic" name="level" id="level">
                                            <option value="" selected="" disabled="">Silahkan Pilih Level</option>
                                            <option value="1" @if(($user->level) == '1') echo selected @endif>Super Admin</option>
                                            <option value="2" @if(($user->level) == '2') echo selected @endif>Admin</option>
                                            <option value="3" @if(($user->level) == '3') echo selected @endif>User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="modal-ubahpassword">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/superadmin/detailuser/ubahpasswordpost" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Password</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Password Baru :</label>
                                        <input type="password" class="form-control" name="password" value="" placeholder="Password">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Re-Type Password :</label>
                                        <input type="password" class="form-control" name="password1" value="" placeholder="Re-Type Password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Ubah Password</button>
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