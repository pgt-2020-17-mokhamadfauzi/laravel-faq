@extends('master.master')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Jawab Pertanyaan</h3>
                </div>
                <form action="/admin/jawabpost" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_pertanyaan_user" value="{{$pertanyaan_user->id_pertanyaan_user}}">
                    <input type="hidden" name="kode_departement" value="{{$pertanyaan_user->kode_departement}}">
                    <input type="hidden" name="departement" value="{{$pertanyaan_user->departement}}">
                    <input type="hidden" name="kode_pertanyaan" value="{{$pertanyaan_user->kode_pertanyaan}}">
                    <input type="hidden" name="sub_kategori" value="{{$pertanyaan_user->sub_kategori}}">
                    <input type="hidden" name="email" value="{{$pertanyaan_user->email}}">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>Silahkan menjawab pertanyaan dari user. Karena dengan menjawab pertanyaan dari user membuat hubungan antara user dan perusahaan jadi harmonis.</p>
                        <div class="body">
                            <div class="row">
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">Penanya :</label>
                                    <input type="text" class="form-control" name="nama" value="{{$pertanyaan_user->nama}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">NIP :</label>
                                    <input type="text" class="form-control" name="nip" value="{{$pertanyaan_user->nip}}" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label for="exampleInputEmail1">Pertanyaan :</label>
                                    <input type="text" class="form-control" name="pertanyaan" value="{{$pertanyaan_user->pertanyaan}}" placeholder="Nama" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pad">
                            <label for="exampleInputEmail1">Jawaban :</label>
                            <div class="mb-3">
                                <textarea class="textarea" name="jawaban" id="jawaban" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                        <div class="box-body text-right" style="margin-top:10px">
                            <a href="/admin/belumdijawab" class="btn btn-danger" style="margin-right:5px">Kembali</a><input type="submit" class="btn btn-warning" style="margin-right:5px" name="draft" value="Save as Draft"><input type="submit" class="btn btn-success" name="jawab" value="Jawab">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@stop