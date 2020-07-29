@extends('master.master')
@section('content')
<!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box Pertanyaan -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-body" style="">
                    <h2>{{$artikel->pertanyaan}}</h2>
                    <br>
                    <!-- <div class="box-body box-profile"> -->
                    @php
                    foreach($jawaban as $js){
                    echo $js->jawaban;
                    }
                    @endphp
                    <!-- </div> -->
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box-body" style="margin-left:10px">
                Apakah artikel ini membantu anda?<a href="/artikel/membantu/{{$id}}" class="btn btn-success btn-sm" style="margin-left:10px">Ya</a><button type="button" style="margin-left:5px" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-tidak">
                Tidak
              </button>
            </div>
        </div>
        <!-- /.box -->

        <!-- Default box Pertanyaan -->
        <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h3 class="box-title">Pertanyaan Terkait</h3>
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

        <!-- Default box -->
        <div class="box box-warning">
        <div class="box-header with-border text-center">
            <h3 class="box-title">Silahkan bertanya</h3>
        </div>
        <!-- <div class="box"> -->
            <div class="box-body" style="">
                <input class="form-control input-lg" name="country_name" id="country_name" type="text" placeholder="Masukan kata kunci (contoh : Bagaimana cara cuti)">
                <div id="countryList" class="" style="margin-top:10px; border-radius: 10px;" align="left"></div>
                        {{ csrf_field() }}
            </div>
                <!-- </div> -->
            <!-- /.box-body -->
        <!-- </div> -->
        </div>
        <!-- /.box -->

        <div class="modal fade" id="modal-tanyakhusus">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/user/tanyakhusus1/post" method="post">
                        {{ csrf_field() }}
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
                                    @php
                                    $sub_kategori = DB::table('sub_kategori')->get();
                                    @endphp
                                    <div class="form-group col-xs-6">
                                        <label for="exampleInputEmail1">Sub Kategori :</label>
                                        <select class="form-control" name="sub_kategori" id="sub_kategori">
                                            <option value="" selected="" disabled="">Silahkan Pilih Sub Kategori</option>
                                            @foreach($sub_kategori as $sk)
                                            <option value="{{$sk->sub_kategori}}">{{$sk->nama_sub_kategori}}</option>
                                            @endforeach
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

        <div class="modal fade" id="modal-tidak">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/user/tanyakhusus/post" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{$id}}">
                        <input type="hidden" name="email" id="email" value="{{Session::get('email')}}">
                        <input type="hidden" name="departement" id="kode_departement" value="{{Session::get('kode_dpt')}}">
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
                                            @foreach($sub_kategori as $sk)
                                            <option value="{{$sk->sub_kategori}}">{{$sk->nama_sub_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputEmail1">Pertanyaan Anda :</label>
                                        <textarea class="form-control" rows="3" name="pertanyaan" placeholder="Tuliskan pertanyaan anda"></textarea>
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