<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Admin extends Controller
{
    public function index()
    {
        $tahun = Carbon::now('Asia/Jakarta')->format('Y');
        $total_visitor = 0;
        $total_visitor_today = 0;
        $total_jawaban_membantu = 0;
        $total_jawaban_tidakpuas = 0;

        $data = array();
        $visitor = DB::table('log_login')->get();
        foreach($visitor as $vs){
          $data[] = $vs;
        }
        $total_visitor = count($data);

        $data_today = array();
        $visitor_today = DB::table('log_login')->where('tanggal', Carbon::now('Asia/Jakarta')->format('Y-m-d'))->get();
        foreach($visitor_today as $vst){
          $data_today[] = $vst;
        }
        $total_visitor_today = count($data_today);

        $data_membantu = array();
        $jawaban_membantu = DB::table('log_artikel')->where('status', '1')->get();
        foreach($jawaban_membantu as $jm){
            $data_membantu[] = $jm;
        }
        $total_jawaban_membantu = count($data_membantu);

        $data_tidakpuas = array();
        $jawaban_tidakpuas = DB::table('log_artikel')->where('status', '0')->get();
        foreach($jawaban_tidakpuas as $jp){
            $data_tidakpuas[] = $jp;
        }
        $total_jawaban_tidakpuas = count($data_tidakpuas);

        // Kategori Yang Sering Dicari
        $kategori1 = array();
        $kategori2 = array();
        $kategori3 = array();
        $kategori4 = array();
        $kategori5 = array();
        $kategori6 = array();
        $kategori7 = array();

        $nilai01 = 0;
        $nilai02 = 0;
        $nilai03 = 0;
        $nilai04 = 0;
        $nilai05 = 0;
        $nilai06 = 0;
        $nilai07 = 0;

        $kategori1 = DB::select('SELECT `kode_departement`, COUNT(*) as a FROM `log_cari` GROUP BY kode_departement ORDER By COUNT(*) DESC LIMIT 0,1');
        $kategori2 = DB::select('SELECT `kode_departement`, COUNT(*) as a FROM `log_cari` GROUP BY kode_departement ORDER By COUNT(*) DESC LIMIT 1,1');
        $kategori3 = DB::select('SELECT `kode_departement`, COUNT(*) as a FROM `log_cari` GROUP BY kode_departement ORDER By COUNT(*) DESC LIMIT 2,1');
        $kategori4 = DB::select('SELECT `kode_departement`, COUNT(*) as a FROM `log_cari` GROUP BY kode_departement ORDER By COUNT(*) DESC LIMIT 3,1');
        $kategori5 = DB::select('SELECT `kode_departement`, COUNT(*) as a FROM `log_cari` GROUP BY kode_departement ORDER By COUNT(*) DESC LIMIT 4,1');
        $kategori6 = DB::select('SELECT `kode_departement`, COUNT(*) as a FROM `log_cari` GROUP BY kode_departement ORDER By COUNT(*) DESC LIMIT 5,1');
        $kategori7 = DB::select('SELECT `kode_departement`, COUNT(*) as a FROM `log_cari` GROUP BY kode_departement ORDER By COUNT(*) DESC LIMIT 6,1');

        foreach($kategori1 as $n01){
            $nilai01 = $n01->a;
        }
        foreach($kategori2 as $n02){
            $nilai02 = $n02->a;
        }
        foreach($kategori3 as $n03){
            $nilai03 = $n03->a;
        }
        foreach($kategori4 as $n04){
            $nilai04 = $n04->a;
        }
        foreach($kategori5 as $n05){
            $nilai05 = $n05->a;
        }
        foreach($kategori6 as $n06){
            $nilai06 = $n06->a;
        }
        foreach($kategori7 as $n07){
            $nilai07 = $n07->a;
        }
        // End Kategori Yang Sering Dicari

        // Kategori Yang Sering Dicari
        $jenis1 = array();
        $jenis2 = array();
        $jenis3 = array();
        $jenis4 = array();
        $jenis5 = array();
        $jenis6 = array();
        $jenis7 = array();

        $nilaijenis01 = 0;
        $nilaijenis02 = 0;
        $nilaijenis03 = 0;
        $nilaijenis04 = 0;
        $nilaijenis05 = 0;
        $nilaijenis06 = 0;
        $nilaijenis07 = 0;

        $jenis1 = DB::select('SELECT `sub_kategori`, COUNT(*) as a FROM `log_cari` GROUP BY sub_kategori ORDER By COUNT(*) DESC LIMIT 0,1');
        $jenis2 = DB::select('SELECT `sub_kategori`, COUNT(*) as a FROM `log_cari` GROUP BY sub_kategori ORDER By COUNT(*) DESC LIMIT 1,1');
        $jenis3 = DB::select('SELECT `sub_kategori`, COUNT(*) as a FROM `log_cari` GROUP BY sub_kategori ORDER By COUNT(*) DESC LIMIT 2,1');
        $jenis4 = DB::select('SELECT `sub_kategori`, COUNT(*) as a FROM `log_cari` GROUP BY sub_kategori ORDER By COUNT(*) DESC LIMIT 3,1');
        $jenis5 = DB::select('SELECT `sub_kategori`, COUNT(*) as a FROM `log_cari` GROUP BY sub_kategori ORDER By COUNT(*) DESC LIMIT 4,1');
        $jenis6 = DB::select('SELECT `sub_kategori`, COUNT(*) as a FROM `log_cari` GROUP BY sub_kategori ORDER By COUNT(*) DESC LIMIT 5,1');
        $jenis7 = DB::select('SELECT `sub_kategori`, COUNT(*) as a FROM `log_cari` GROUP BY sub_kategori ORDER By COUNT(*) DESC LIMIT 6,1');

        foreach($jenis1 as $nj01){
            $nilaijenis01 = $nj01->a;
        }
        foreach($jenis2 as $nj02){
            $nilaijenis02 = $nj02->a;
        }
        foreach($jenis3 as $nj03){
            $nilaijenis03 = $nj03->a;
        }
        foreach($jenis4 as $nj04){
            $nilaijenis04 = $nj04->a;
        }
        foreach($jenis5 as $nj05){
            $nilaijenis05 = $nj05->a;
        }
        foreach($jenis6 as $nj06){
            $nilaijenis06 = $nj06->a;
        }
        foreach($jenis7 as $nj07){
            $nilaijenis07 = $nj07->a;
        }
        // End Kategori Yang Sering Dicari

        if(Session::get('login')){
            if(Session::get('level') != '3'){
                return view('admin.dashboard',['tahun'=>$tahun,'total_visitor'=>$total_visitor, 'total_visitor_today'=>$total_visitor_today, 'total_jawaban_membantu'=>$total_jawaban_membantu, 'total_jawaban_tidakpuas'=>$total_jawaban_tidakpuas, 
                'kategori1' => $kategori1,
                'kategori2' => $kategori2,
                'kategori3' => $kategori3,
                'kategori4' => $kategori4,
                'kategori5' => $kategori5,
                'kategori6' => $kategori6,
                'kategori7' => $kategori7,
                'nilai01' => $nilai01,
                'nilai02' => $nilai02,
                'nilai03' => $nilai03,
                'nilai04' => $nilai04,
                'nilai05' => $nilai05,
                'nilai06' => $nilai06,
                'nilai07' => $nilai07,
                'jenis1' => $jenis1,
                'jenis2' => $jenis2,
                'jenis3' => $jenis3,
                'jenis4' => $jenis4,
                'jenis5' => $jenis5,
                'jenis6' => $jenis6,
                'jenis7' => $jenis7,
                'nilaijenis01' => $nilaijenis01,
                'nilaijenis02' => $nilaijenis02,
                'nilaijenis03' => $nilaijenis03,
                'nilaijenis04' => $nilaijenis04,
                'nilaijenis05' => $nilaijenis05,
                'nilaijenis06' => $nilaijenis06,
                'nilaijenis07' => $nilaijenis07,
                ]);
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function belumdijawab()
    {
        $pertanyaan_user = DB::table('pertanyaan_user')->where('kode_departement', Session::get('kode_dpt'))->where('status', '1')->get();
        if(Session::get('login')){
            if(Session::get('level') == '2'){
                return view('admin.belumdijawab',['pertanyaan_user'=>$pertanyaan_user]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function jawab($id)
    {
        $pertanyaan_user = DB::table('pertanyaan_user')->where('id_pertanyaan_user', $id)->first();
        if(Session::get('login')){
            if(Session::get('level') == '2'){
                return view('admin.jawab',['pertanyaan_user'=>$pertanyaan_user]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function jawabpost(Request $request)
    {
        $nip = $request->nip;
        $nama = $request->nama;
        $departement = $request->departement;
        $email = $request->email;
        $pertanyaan = $request->pertanyaan;
        $id_pertanyaan_user = $request->id_pertanyaan_user;
        $jawaban = $request->jawaban;
        $kode_departement = $request->kode_departement;
        $sub_kategori = $request->sub_kategori;
        $status_jawaban = '0';
        $status_pertanyaan = '2';
        $aksi = '3';

        $jsonkode_pertanyaan = array();
        $kode_jawaban_sebelum = DB::table('jawaban')->where('sub_kategori',$sub_kategori)->orderBy('id_jawaban','DESC')->limit(1)->get();
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

        DB::table('jawaban')->insert([
            'jawaban' => $jawaban,
            'kode_departement' => $kode_departement,
            'kode_pertanyaan' => $kode_pertanyaan,
            'sub_kategori' => $sub_kategori,
            'status' => $status_jawaban,
        ]);

        DB::table('pertanyaan_user')->where('id_pertanyaan_user', $id_pertanyaan_user)->update([
            'kode_pertanyaan' => $kode_pertanyaan,
            'status' => $status_pertanyaan,
            'aksi' => $aksi,
        ]);

        $status = 0;
        $aksi_pertanyaan = 1;
        $url = 'artikel/'.$kode_pertanyaan;
        DB::table('pertanyaan')->insert([
            'nip' => $nip,
            'nama' => $nama,
            'email' => $email,
            'departement' => $departement,
            'pertanyaan' => $pertanyaan,
            'url' => $url,
            'kode_pertanyaan' => $kode_pertanyaan,
            'kode_departement' => $kode_departement,
            'sub_kategori' => $sub_kategori,
            'status' => $status,
            'aksi' => $aksi_pertanyaan, 
        ]);

        return redirect('/admin/belumdijawab')->with('success', 'Berhasil menjawab pertanyaan!');
    }

    public function sudahdijawab()
    {
        $pertanyaan_user = DB::table('pertanyaan')->where('kode_departement', Session::get('kode_dpt'))->get();

        if(Session::get('login')){
            if(Session::get('level') == '2'){
                return view('admin.sudahdijawab',['pertanyaan_user'=>$pertanyaan_user]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function detailjawaban($id)
    {
        $artikel = DB::table('pertanyaan_user')->where('kode_pertanyaan', $id)->first();
        $jawaban = DB::table('jawaban')->where('kode_pertanyaan',$id)->get();

        if(Session::get('login')){
            if(Session::get('level') == '2'){
                return view('admin.detailjawaban',['artikel'=>$artikel,'jawaban'=>$jawaban]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function ubahjawaban($id)
    {
        $artikel = DB::table('pertanyaan')->where('kode_pertanyaan', $id)->first();
        $jawaban = DB::table('jawaban')->where('kode_pertanyaan',$id)->get();
        if(Session::get('login')){
            if(Session::get('level') == '2'){
                return view('admin.ubahjawaban',['pertanyaan_user'=>$artikel,'jawaban'=>$jawaban]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function ubahpost(Request $request)
    {
        $kode_pertanyaan = $request->kode_pertanyaan;
        $jawaban = $request->jawaban;
        DB::table('jawaban')->where('kode_pertanyaan',$kode_pertanyaan)->update([
            'jawaban' => $jawaban,
        ]);

        return redirect()->back()->with('success', 'Berhasil merubah jawaban!');
    }

    public function koreksi()
    {
        $pertanyaan_user = DB::table('pertanyaan')->where('aksi','2')->where('kode_departement', Session::get('kode_dpt'))->get();
        if(Session::get('login')){
            if(Session::get('level') == '2'){
                return view('admin.koreksi', ['pertanyaan_user'=>$pertanyaan_user]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function koreksijawaban($id)
    {
        $artikel = DB::table('pertanyaan')->where('kode_pertanyaan', $id)->first();
        $jawaban = DB::table('jawaban')->where('kode_pertanyaan',$id)->get();
        if(Session::get('login')){
            if(Session::get('level') == '2'){
                return view('admin.koreksijawaban',['pertanyaan_user'=>$artikel,'jawaban'=>$jawaban]);
            }elseif(Session::get('level') == '1'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function koreksipost(Request $request)
    {
        $kode_pertanyaan = $request->kode_pertanyaan;
        $jawaban = $request->jawaban;
        $aksi = '3';
        DB::table('jawaban')->where('kode_pertanyaan',$kode_pertanyaan)->update([
            'jawaban' => $jawaban,
        ]);

        DB::table('pertanyaan')->where('kode_pertanyaan', $kode_pertanyaan)->update([
            'aksi' => $aksi,
        ]);

        return redirect('/admin/koreksi')->with('success', 'Berhasil koreksi jawaban!');
    }
}
