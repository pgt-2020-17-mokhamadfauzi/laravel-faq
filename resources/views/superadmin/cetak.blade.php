<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Visitor.xls");
?>
<table border="1">
    
        <tr>
            <th>NO</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Departement</th>
            <th>Level</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
    
    
        @php
        $no =1;
        @endphp
        @foreach($cetak_visitor as $cv)
        @php
        $departement = DB::table('departement')->where('kode_departement',$cv->kode_departement)->first();
        @endphp
        <tr>
            <td>{{$no++}}</td>
            <td>{{$cv->nip}}</td>
            <td>{{$cv->nama}}</td>
            <td>{{$departement->nama_departement}}</td>
            <td>@if(($cv->level) == '1')Super Admin @elseif(($cv->level) == '2')Admin @elseif(($cv->level) == '3')User @endif</td>
            <td>{{$cv->tanggal}}</td>
            <td>{{$cv->waktu}}</td>
        </tr>
        @endforeach
    
</table>