<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Log Pertanyaan.xls");
?>
<table border="1">
    
        <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Departement</th>
            <th>Kode Pertanyaan</th>
            <th>Kategori</th>
            <th>Jenis Pertanyaan</th>
            <th>Pertanyaan</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
    
    
        @php
        $no =1;
        @endphp
        @foreach($cetak_pertanyaan as $cp)
        
        <tr>
            <td>{{$no++}}</td>
            <td>{{$cp->nip}}</td>
            <td>{{$cp->nama}}</td>
            <td>@php
                $departement = DB::table('departement')->where('kode_departement',$cp->departement)->first();
                @endphp
            {{$departement->nama_departement}}</td>
            <td>{{$cp->kode_pertanyaan}}</td>
            <td>@php
                $kategori = DB::table('kategori')->where('kode_departement', $cp->kode_departement)->first();
                @endphp            
            {{$kategori->nama_departement}}</td>
            <td>@php
                $jenis_pertanyaan = DB::table('sub_kategori')->where('sub_kategori', $cp->sub_kategori)->first();
                @endphp
            {{$jenis_pertanyaan->nama_sub_kategori}}
            </td>
            <td>@php
                $pertanyaan = DB::table('pertanyaan')->where('kode_pertanyaan', $cp->kode_pertanyaan)->first();
                @endphp 
            {{$pertanyaan->pertanyaan}}            
            </td>
            <td>{{$cp->tanggal}}</td>
            <td>{{$cp->waktu}}</td>
        </tr>
        @endforeach
    
</table>