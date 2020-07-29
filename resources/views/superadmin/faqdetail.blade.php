@extends('master.master')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Detail Pertanyaan</h3>
                </div>
                <form action="/admin/jawabpost" method="post">
                    {{ csrf_field() }}
                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="body">
                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Pertanyaan :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$pertanyaan->pertanyaan}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Kode Pertanyaan :</label>
                                    <input type="text" class="form-control" name="nip" value="{{$pertanyaan->kode_pertanyaan}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Departement :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$pertanyaan->kode_departement}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Sub Kategori :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$pertanyaan->sub_kategori}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">URL :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$pertanyaan->url}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Status :</label>
                                    @php
                                    if(($pertanyaan->status)== '1'){
                                    $status = 'Diterbitkan';
                                    }
                                    @endphp
                                    <input type="text" class="form-control" name="nama" value="{{$status}}" placeholder="Nama" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="box-body text-right" style="margin-top:10px">
                            <a href="/superadmin/datafaq" class="btn btn-danger" style="margin-right:5px">Kembali</a><button type="button" style="" class="btn btn-success" data-toggle="modal" data-target="#modal-ubah">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-ubah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/datafaq/detail/ubahpost" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_pertanyaan" value="{{$pertanyaan->id_pertanyaan}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Pertanyaan</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Pertanyaan :</label>
                                        <input type="text" class="form-control" name="pertanyaan" value="{{$pertanyaan->pertanyaan}}" placeholder="Nama">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Status :</label>
                                        <select class="form-control dynamic" name="status" id="status">
                                            <option value="" selected="" disabled="">Silahkan Pilih Status</option>
                                            <option value="4" @if(($pertanyaan->aksi) == '4') echo selected @endif>Aktif</option>
                                            <option value="5" @if(($pertanyaan->aksi) == '5') echo selected @endif>Tidak Aktif</option>
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

</section>

@stop