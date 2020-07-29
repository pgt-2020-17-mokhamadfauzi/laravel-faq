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
            <div class="box-body text-right" style="margin-left:10px">
                <a href="/superadmin/datafaq" class="btn btn-danger" style="margin-right:5px">Kembali</a><button type="button" style="" class="btn btn-success" data-toggle="modal" data-target="#modal-ubah">Ubah</button>
            </div>
        </div>
        <!-- /.box -->

        <div class="modal fade" id="modal-ubah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/datafaq/detailpost" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_pertanyaan" value="{{$artikel->kode_pertanyaan}}">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Ubah Jawaban</h4>
                        </div>
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <label for="exampleInputEmail1">Pertanyaan :</label>
                                        <input type="text" class="form-control" name="nama" value="{{$artikel->pertanyaan}}" placeholder="Nama" readonly>
                                    </div>
                                    <div class="card-body pad">
                                        <label for="exampleInputEmail1">Jawaban :</label>
                                        <div class="mb-3">
                                            <textarea class="textarea" name="jawaban" id="jawaban" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            @php
                                            foreach($jawaban as $js){
                                            echo $js->jawaban;
                                            }
                                            @endphp
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Ubah</button>
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