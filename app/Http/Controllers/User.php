<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class User extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        $pertanyaan = DB::table('pertanyaan')->limit(7)->get();
        if(Session::get('login')){
            if(Session::get('level') == '3'){
                return view('user.dashboard',['pertanyaan'=>$pertanyaan,'kategori'=>$kategori]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }
        }else{
            return redirect('/');
        }
    }

    public function bykategori($id)
    {
        $kategori = DB::table('kategori')->get();
        $pertanyaan = DB::table('pertanyaan')->where('kode_departement',$id)->get();
        $nama_departement = DB::table('kategori')->where('kode_departement',$id)->first();
        if(!Session::get('login')){
            return redirect('/')->with('danger','Anda Harus Login!');
        }elseif(Session::get('level') != "3"){
            return redirect('/admin');
        }else{
            return view('user.bykategori',['nama_departement'=>$nama_departement,'pertanyaan'=>$pertanyaan,'kategori'=>$kategori]);
        }
    }

    public function fetch(Request $request)
    {
        $no= 1;
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('pertanyaan')
                ->where('pertanyaan', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="list-group" style="display:block; background:white; position:relative;">';
            foreach($data as $row)
            {
                $output .= '<li class="list-group-item" style=""><a href="'.$row->url.'" style="color:black">'.$row->pertanyaan.'</a></li>';
            }   
                $output .= '<li class="list-group-item" style=""><a href="#" style="color:black" data-toggle="modal" data-target="#modal-tanyakhusus">Tanyakan pertanyaan khusus</a></li>';
                $output .= '</ul>';
            echo $output;
        }
    }

    public function artikel($id)
    {
        $sub_kategori = substr($id,0,6);
        $kode_departement = substr($id,0,4);
        $tanggal = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $waktu = Carbon::now('Asia/Jakarta')->format('H:i:s');
        $artikel = DB::table('pertanyaan')->where('kode_pertanyaan', $id)->first();
        $pertanyaan = DB::table('pertanyaan')->where('sub_kategori',$sub_kategori)->limit(7)->get();
        $jawaban = DB::table('jawaban')->where('kode_pertanyaan',$id)->get();
        $kategori = DB::table('kategori')->get();
        if(!Session::get('login')){
            return redirect('/')->with('warning','Anda harus login terlebih dahulu!');
        }elseif(Session::get('level') != "3"){
            return redirect('/admin');
        }else{
            DB::table('log_cari')->insert([
                'nama' => Session::get('nama'),
                'nip' => Session::get('nip'),
                'departement' => Session::get('kode_dpt'),
                'kode_pertanyaan' => $id,
                'kode_departement' => $kode_departement,
                'sub_kategori' => $sub_kategori,
                'tanggal' => $tanggal,
                'waktu' => $waktu,
            ]);
            return view('user.artikel',['artikel'=>$artikel,'pertanyaan'=>$pertanyaan,'id'=>$id, 'kategori'=>$kategori,'jawaban'=>$jawaban]);
        }
    }

    public function artikelmembantu($id)
    {
        $nama = Session::get('nama');
        $nip = Session::get('nip');
        $departement = Session::get('kode_dpt');
        $status = 1;
        $kode_pertanyaan = $id;
        $kode_departement = substr($id,0,4);
        $tanggal = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $waktu = Carbon::now('Asia/Jakarta')->format('H:i:s');

        DB::table('log_artikel')->insert([
            'nama' => $nama,
            'nip' => $nip,
            'departement' => $departement,
            'kode_pertanyaan' => $kode_pertanyaan,
            'kode_departement' => $kode_departement,
            'sub_kategori' => substr($id,0,6),
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'status' => $status,
        ]);

        return redirect('/dashboard')->with('success','Terimakasih sudah memberikan feedback!');
    }

    function fetchkhusus(Request $request)
    {
        $kode_departement = $request->kode_departement;
        $row = DB::table('pertanyaan')->where('kode_departement',$kode_departement)->get();
        $output = '<option value="">Silahkan Pilih Sub Kategori</option>';
        foreach($data as $row){
            $output = '<option value="'.$row->kode_pertanyaan.'">'.$row->pertanyaan.'</option>';
        }
        echo $output;
    }

    public function profil()
    {
        
        return view('user.profil');
        
    }

    public function tanyakhususpost(Request $request)
    {
        $nip = $request->nip;
        $nama = $request->nama;
        $pertanyaan = $request->pertanyaan;
        $email = $request->email;
        $departement = $request->departement;
        $kode_departement = $request->kode_departement;
        $sub_kategori = $request->sub_kategori;
        $status = '1';
        $aksi = '1';

        $jsonkode_pertanyaan = array();
        $kode_jawaban_sebelum = DB::table('pertanyaan_user')->where('sub_kategori',$sub_kategori)->orderBy('id_pertanyaan_user','DESC')->limit(1)->get();
        $jsonkode_pertanyaan = json_decode($kode_jawaban_sebelum,TRUE);
        foreach($jsonkode_pertanyaan as $jkp){
            $kode_pertanyaan_sebelum = $jkp['kode_pertanyaan'];
        }
        if(empty($kode_pertanyaan_sebelum)){
            $kode_pertanyaan = $sub_kategori.-1;
        }else{
        $k_pertanyaan_awal = substr($kode_pertanyaan_sebelum,0,7);
        $k_pertanyaan_akhir = substr($kode_pertanyaan_sebelum,7,1);
        $k_pertanyaan_plus = $k_pertanyaan_akhir + 1;
        $kode_pertanyaan = $k_pertanyaan_awal.$k_pertanyaan_plus;
        }

        DB::table('pertanyaan_user')->insert([
            'nip' => $nip,
            'nama' => $nama,
            'email' => $email,
            'departement' => $departement,
            'pertanyaan' => $pertanyaan,
            'kode_pertanyaan' => $kode_pertanyaan,
            'kode_departement' => $kode_departement,
            'sub_kategori' => $sub_kategori,
            'status' => $status,
            'aksi' => $aksi,
            'terlihat' => '1',
        ]);

        return redirect()->back()->with('success', 'Berhasil bertanya khusus!');
    }

    public function tanyakhususposttidakpuas(Request $request)
    {
        $tanggal = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $waktu = Carbon::now('Asia/Jakarta')->format('H:i:s');
        $nip = $request->nip;
        $nama = $request->nama;
        $pertanyaan = $request->pertanyaan;
        $email = $request->email;
        $departement = $request->departement;
        $kode_departement = $request->kode_departement;
        $sub_kategori = $request->sub_kategori;
        $status = '1';
        $aksi = '1';

        $jsonkode_pertanyaan = array();
        $kode_jawaban_sebelum = DB::table('pertanyaan_user')->where('sub_kategori',$sub_kategori)->orderBy('id_pertanyaan_user','DESC')->limit(1)->get();
        $jsonkode_pertanyaan = json_decode($kode_jawaban_sebelum,TRUE);
        foreach($jsonkode_pertanyaan as $jkp){
            $kode_pertanyaan_sebelum = $jkp['kode_pertanyaan'];
        }
        if(empty($kode_pertanyaan_sebelum)){
            $kode_pertanyaan = $sub_kategori.-1;
        }else{
        $k_pertanyaan_awal = substr($kode_pertanyaan_sebelum,0,7);
        $k_pertanyaan_akhir = substr($kode_pertanyaan_sebelum,7,1);
        $k_pertanyaan_plus = $k_pertanyaan_akhir + 1;
        $kode_pertanyaan = $k_pertanyaan_awal.$k_pertanyaan_plus;
        }

        DB::table('pertanyaan_user')->insert([
            'nip' => $nip,
            'nama' => $nama,
            'email' => $email,
            'departement' => $departement,
            'pertanyaan' => $pertanyaan,
            'kode_pertanyaan' => $kode_pertanyaan,
            'kode_departement' => $kode_departement,
            'sub_kategori' => $sub_kategori,
            'status' => $status,
            'aksi' => $aksi,
            'terlihat' => '1',
        ]);

        DB::table('log_artikel')->insert([
            'nama' => $nama,
            'nip' => $nip,
            'departement' => $departement,
            'kode_pertanyaan' => $request->id,
            'kode_departement' => substr($request->id,0,4),
            'sub_kategori' => substr($request->id,0,6),
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'status' => '0',
        ]);

        return redirect()->back()->with('success', 'Berhasil bertanya khusus!');
    }
}
