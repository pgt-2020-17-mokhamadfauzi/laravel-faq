<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Artikel.xls");
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
            <th>Status</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
    
    
        @php
        $no =1;
        @endphp
        @foreach($cetak_artikel as $ca)
        @php
        
        
        
        @endphp
        <tr>
            <td>{{$no++}}</td>
            <td>{{$ca->nip}}</td>
            <td>{{$ca->nama}}</td>
            <td>@php
                $departement = DB::table('departement')->where('kode_departement',$ca->departement)->first();
                @endphp
            {{$departement->nama_departement}}</td>
            <td>{{$ca->kode_pertanyaan}}</td>
            <td>@php
                $kategori = DB::table('kategori')->where('kode_departement', $ca->kode_departement)->first();
                @endphp            
            {{$kategori->nama_departement}}</td>
            <td>@php
                $jenis_pertanyaan = DB::table('sub_kategori')->where('sub_kategori', $ca->sub_kategori)->first();
                @endphp
            {{$jenis_pertanyaan->nama_sub_kategori}}
            </td>
            <td>@php
                $pertanyaan = DB::table('pertanyaan')->where('kode_pertanyaan', $ca->kode_pertanyaan)->first();
                @endphp 
            {{$pertanyaan->pertanyaan}}            
            </td>
            <td>@if(($ca->status) == '1')Membantu @elseif(($ca->status) == '0')Tidak Membantu @endif</td>
            <td>{{$ca->tanggal}}</td>
            <td>{{$ca->waktu}}</td>
        </tr>
        @endforeach
    
</table>