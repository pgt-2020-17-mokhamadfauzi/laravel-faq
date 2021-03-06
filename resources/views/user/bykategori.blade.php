@extends('master.master')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <div class="box">
            <div class="box-body" style="background-color:#27a6d9">
                <div class="box-body box-profile">

                    <h2 class="text-center" style="color:#FFFFFF">Selamat Datang!</h2>

                    <p class="text-center" style="font-size:18px; color:#FFFFFF"><b>{{Session::get('nama')}},</b> ada yang bisa kami bantu?</p>
                    <div class="box-body" style="margin-top:30px">
                        <input class="form-control input-lg" name="country_name" id="country_name" type="text" placeholder="Masukan kata kunci (contoh : Bagaimana cara cuti)">
                        <div id="countryList" class="" style="margin-top:10px; border-radius: 10px;" align="left"></div>
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- Default box Pertanyaan -->
        <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Pertanyaan Terkait {{$nama_departement->nama_departement}}</h3>
            </div>
            <div class="box-body" style="">
                <!-- <div class="box-body box-profile"> -->
                    <ul class="list-group">
                        @foreach($pertanyaan as $pt)
                            <li class="list-group-item"><a href="/{{$pt->url}}" style="color:black">{{$pt->pertanyaan}}</a></li>
                        @endforeach
                    </ul>
                <!-- </div> -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="modal fade" id="modal-tanyakhusus">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Pertanyaan Khusus</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Nama :</label>
                                        <input type="text" class="form-control" name="nama" value="{{Session::get('nama')}}" placeholder="Nama" readonly>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">NIP :</label>
                                        <input type="text" class="form-control" name="nip" value="{{Session::get('nip')}}" placeholder="NIP" readonly>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Kepada :</label>
                                        <select class="form-control dynamic" name="kode_departement" id="kode_departement">
                                            <option value="" selected="" disabled="">Silahkan Pilih Departement</option>
                                            @foreach($kategori as $kt)
                                            <option value="{{$kt->kode_departement}}">{{$kt->nama_departement}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Sub Kategori :</label>
                                        <select class="form-control" name="sub_kategori" id="sub_kategori">
                                            <option value="" selected="" disabled="">Silahkan Pilih Sub Kategori</option>
                                            <option value="HR02-1">Cuti</option>
                                        </select>
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputEmail1">Pertanyaan Anda :</label>
                                        <textarea class="form-control" rows="3" placeholder="Tuliskan pertanyaan anda"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>
    <!-- /.content -->
@stop