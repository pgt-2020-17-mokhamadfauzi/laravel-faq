<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPMailer\PHPMailer;

class SuperAdmin extends Controller
{
    public function belumdijawab()
    {
        $pertanyaan_user = DB::table('pertanyaan_user')->where('status', '1')->where('terlihat', '1')->get();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.belumdijawab',['pertanyaan_user'=>$pertanyaan_user]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function sudahdijawab()
    {
        $pertanyaan_user = DB::table('pertanyaan')->where('status', '0')->get();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.sudahdijawab',['pertanyaan_user'=>$pertanyaan_user]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function lihatjawaban($id)
    {
        $artikel = DB::table('pertanyaan_user')->where('kode_pertanyaan', $id)->first();
        $jawaban = DB::table('jawaban')->where('kode_pertanyaan',$id)->get();

        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.lihatjawaban',['artikel'=>$artikel,'jawaban'=>$jawaban]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function koreksi($id)
    {
        $aksi = 2;
        DB::table('pertanyaan')->where('kode_pertanyaan',$id)->update([
            'aksi' => $aksi,
        ]);

        return redirect('/superadmin/sudahdijawab')->with('success','Berhasil meminta admin untuk menkoreksi!');
    }

    public function datafaq()
    {
        $pertanyaan = DB::table('pertanyaan')->where('status','1')->get();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.datafaq',['pertanyaan'=>$pertanyaan]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function datafaqdetail($id)
    {
        $artikel = DB::table('pertanyaan')->where('kode_pertanyaan', $id)->first();
        $jawaban = DB::table('jawaban')->where('kode_pertanyaan',$id)->get();

        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.datafaqdetail',['artikel'=>$artikel,'jawaban'=>$jawaban]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function release($id)
    {
        
        DB::table('pertanyaan')->where('kode_pertanyaan',$id)->update([
            'aksi' => '4',
            'status' => '1'
        ]);

        return redirect('/superadmin/sudahdijawab')->with('success','Berhasil menerbitkan jawaban!');
    }

    public function detailpost(Request $request)
    {
        $id_pertanyaan = $request->id_pertanyaan;
        $jawaban = $request->jawaban;

        DB::table('jawaban')->where('kode_pertanyaan',$id_pertanyaan)->update([
            'jawaban' => $jawaban,
        ]);

        return redirect()->back()->with('success','Jawaban berhasil diubah!');
    }

    public function faqdetail($id)
    {
        $pertanyaan = DB::table('pertanyaan')->where('kode_pertanyaan',$id)->first();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.faqdetail',['pertanyaan'=>$pertanyaan]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function faqubahpost(Request $request)
    {
        $id_pertanyaan = $request->id_pertanyaan;
        $pertanyaan = $request->pertanyaan;
        $status = $request->status;

        DB::table('pertanyaan')->where('id_pertanyaan', $id_pertanyaan)->update([
            'pertanyaan' => $pertanyaan,
            'aksi' => $status,
        ]);

        return redirect()->back()->with('success', 'Data pertanyaan berhasil diubah!');
    }

    public function datauser()
    {
        $user = DB::table('model_users')->where('level', '3')->get();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.datauser',['user'=>$user]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function datausertambahpost(Request $request)
    {
        $nip = $request->nip;
        $password = $request->password;
        $name = $request->nama;
        $email = $request->email;
        $status = $request->status;
        $level = '3';
        $kode_departement = $request->kode_departement;

        DB::table('model_users')->insert([
            'nip' => $nip,
            'password' => bcrypt($password),
            'name' => $name,
            'email' => $email,
            'status' => $status,
            'level' => $level,
            'kode_departement' => $kode_departement,
            'status_menu' => '1',
        ]);

        return redirect()->back()->with('success','Berhasil menambah data user!');
    }

    public function detailuser($id)
    {
        $user = DB::table('model_users')->where('id',$id)->first();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.detailuser', ['user'=>$user]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function detailuserubahpost(Request $request)
    {
        $id = $request->id;
        $password = $request->password;
        $password1 = $request->password1;

        if($password != $password1){
            return redirect()->back()->with('warning','Password tidak sama!');
        }else{
            DB::table('model_users')->where('id',$id)->update([
                'password' => bcrypt($password),
            ]);
            return redirect()->back()->with('success','Berhasil merubah password!');
        }
    }

    public function ubahpost(Request $request)
    {
        $id = $request->id;
        $name = $request->nama;
        $nip = $request->nip;
        $email = $request->email;
        $kode_departement = $request->kode_departement;
        $status = $request->status;
        $level = $request->level;

        DB::table('model_users')->where('id',$id)->update([
            'name' => $name,
            'nip' => $nip,
            'email' => $email,
            'kode_departement' => $kode_departement,
            'status' => $status,
            'level' => $level,
        ]);

        return redirect()->back()->with('success','Berhasil merubah data user!');
    }

    public function datauserhapus($id)
    {
        DB::table('model_users')->where('id',$id)->delete();
        return redirect()->back()->with('success','Berhasil menghapus data!');
    }

    public function dataadmin()
    {
        $admin = DB::table('model_users')->where('level', '<>', '3')->get();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.dataadmin',['admin'=>$admin]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function dataadmintambahpost(Request $request)
    {
        $nip = $request->nip;
        $password = $request->password;
        $name = $request->nama;
        $email = $request->email;
        $status = $request->status;
        $level = $request->level;
        $kode_departement = $request->kode_departement;

        $validasi = DB::table('model_users')->where('nip',$nip)->get();
        if(!empty($validasi)){
            return redirect()->back()->with('warning', 'NIP sudah ada!');
        }else{
            DB::table('model_users')->insert([
                'nip' => $nip,
                'password' => bcrypt($password),
                'name' => $name,
                'email' => $email,
                'status' => $status,
                'level' => $level,
                'kode_departement' => $kode_departement,
                'status_menu' => '1',
            ]);

            return redirect()->back()->with('success', 'Berhasil menambah data admin!');
        }
    }

    public function dataadmindetail($id)
    {
        $dataadmin = DB::table('model_users')->where('id',$id)->first();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.detailadmin',['dataadmin'=>$dataadmin]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function adminubahpost(Request $request)
    {
        $id = $request->id;
        $name = $request->nama;
        $nip = $request->nip;
        $email = $request->email;
        $kode_departement = $request->kode_departement;
        $status = $request->status;
        $level = $request->level;

        DB::table('model_users')->where('id',$id)->update([
            'name' => $name,
            'nip' => $nip,
            'email' => $email,
            'kode_departement' => $kode_departement,
            'status' => $status,
            'level' => $level,
        ]);

        return redirect()->back()->with('success','Berhasil merubah data admin!');
    }

    public function settingmenu()
    {
        $menu1 = DB::table('group_menu')->where('id_group_menu', '1')->first();
        $menu2 = DB::table('group_menu')->where('id_group_menu', '2')->first();
        $menu3 = DB::table('group_menu')->where('id_group_menu', '3')->first();

        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.settingmenu',['menu1'=>$menu1,'menu2'=>$menu2,'menu3'=>$menu3]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function menu1post(Request $request)
    {
        $id_fitur01 = $request->id_fitur01;
        $status01 = $request->status01;
        $hak_akses01 = $request->hak_akses01;
        DB::table('fitur')->where('id_fitur',$id_fitur01)->update([
            'status' => $status01,
            'hak_akses' => $hak_akses01,
        ]);

        $id_fitur02 = $request->id_fitur02;
        $status02 = $request->status02;
        $hak_akses02 = $request->hak_akses02;
        DB::table('fitur')->where('id_fitur',$id_fitur02)->update([
            'status' => $status02,
            'hak_akses' => $hak_akses02,
        ]);

        $id_fitur03 = $request->id_fitur03;
        $status03 = $request->status03;
        $hak_akses03 = $request->hak_akses03;
        DB::table('fitur')->where('id_fitur',$id_fitur03)->update([
            'status' => $status03,
            'hak_akses' => $hak_akses03,
        ]);

        $id_fitur04 = $request->id_fitur04;
        $status04 = $request->status04;
        $hak_akses04 = $request->hak_akses04;
        DB::table('fitur')->where('id_fitur',$id_fitur04)->update([
            'status' => $status04,
            'hak_akses' => $hak_akses04,
        ]);

        $id_fitur05 = $request->id_fitur05;
        $status05 = $request->status05;
        $hak_akses05 = $request->hak_akses05;
        DB::table('fitur')->where('id_fitur',$id_fitur05)->update([
            'status' => $status05,
            'hak_akses' => $hak_akses05,
        ]);

        return redirect()->back()->with('success', 'Berhasil merubah setting menu super admin!');
    }

    public function menu2post(Request $request)
    {
        $id_fitur02 = $request->id_fitur02;
        $status0 = $request->status0;
        DB::table('fitur')->where('id_fitur',$id_fitur02)->update([
            'status' => $status0,
        ]);

        $id_user_sub_fitur01 = $request->id_user_sub_fitur01;
        $status01 = $request->status01;
        $hak_akses01 = $request->hak_akses01;
        DB::table('user_sub_fitur')->where('id_user_sub_fitur',$id_user_sub_fitur01)->update([
            'status' => $status01,
            'hak_akses' => $hak_akses01,
        ]);

        $id_user_sub_fitur02 = $request->id_user_sub_fitur02;
        $status02 = $request->status02;
        $hak_akses02 = $request->hak_akses02;
        DB::table('user_sub_fitur')->where('id_user_sub_fitur',$id_user_sub_fitur02)->update([
            'status' => $status02,
            'hak_akses' => $hak_akses02,
        ]);

        $id_user_sub_fitur03 = $request->id_user_sub_fitur03;
        $status03 = $request->status03;
        $hak_akses03 = $request->hak_akses03;
        DB::table('user_sub_fitur')->where('id_user_sub_fitur',$id_user_sub_fitur03)->update([
            'status' => $status03,
            'hak_akses' => $hak_akses03,
        ]);

        return redirect()->back()->with('success', 'Berhasil merubah setting menu admin!');
    }

    public function penggunaaktif01($id)
    {
        DB::table('model_users')->where('id',$id)->update([
            'status_menu' => '1',
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah status menu!');
    }

    public function penggunatidakaktif01($id)
    {
        DB::table('model_users')->where('id',$id)->update([
            'status_menu' => '0',
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah status menu!');
    }

    public function variable()
    {
        $variable = DB::table('variable')->get();
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.variable',['variable'=>$variable]);
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function report()
    {
        if(Session::get('login')){
            if(Session::get('level') == '1'){
                return view('superadmin.report');
            }elseif(Session::get('level') == '2'){
                return redirect('/admin');
            }else{
                return redirect('/dashboard');
            }
        }else{
            return redirect('/');
        }
    }

    public function cetak(Request $request)
    {
        $date_from = Carbon::createFromFormat('m/d/Y', $request->date_from)->format('Y-m-d');
        $date_to = Carbon::createFromFormat('m/d/Y', $request->date_to)->format('Y-m-d');

        // Cetak Visitor
        $cetak_visitor = DB::table('log_login')->where('tanggal', '>=', $date_from)->where('tanggal','<=', $date_to)->get();

        return view('superadmin.cetak',['cetak_visitor'=>$cetak_visitor]);
    }

    public function cetakartikel(Request $request)
    {
        $date_from = Carbon::createFromFormat('m/d/Y', $request->date_from)->format('Y-m-d');
        $date_to = Carbon::createFromFormat('m/d/Y', $request->date_to)->format('Y-m-d');

        // Cetak Visitor
        $cetak_artikel = DB::table('log_artikel')->where('tanggal', '>=', $date_from)->where('tanggal','<=', $date_to)->get();

        return view('superadmin.cetakartikel',['cetak_artikel'=>$cetak_artikel]);
    }

    public function cetakpertanyaan(Request $request)
    {
        $date_from = Carbon::createFromFormat('m/d/Y', $request->date_from)->format('Y-m-d');
        $date_to = Carbon::createFromFormat('m/d/Y', $request->date_to)->format('Y-m-d');

        // Cetak Visitor
        $cetak_pertanyaan = DB::table('log_cari')->where('tanggal', '>=', $date_from)->where('tanggal','<=', $date_to)->get();

        return view('superadmin.cetakpertanyaan',['cetak_pertanyaan'=>$cetak_pertanyaan]);
    }

    public function ingatkan($id)
    {
        $data_pertanyaan_khusus = DB::table('pertanyaan_user')->where('id_pertanyaan_user',$id)->get();
        $decode = array();
        $decode = json_decode($data_pertanyaan_khusus,TRUE);
        foreach($decode as $dc){
            $kode_departement = $dc['kode_departement'];
            $pertanyaan = $dc['pertanyaan'];
        }
        $data_admin = DB::table('model_users')->where('kode_departement',$kode_departement)->where('level','2')->get();
        $decode_email = json_decode($data_admin,TRUE);
        foreach($decode_email as $de){
            $email = $de['email'];
        }
        
        $subject = 'Peringatan Menjawab Pertanyaan';
        $text = '<h1>Diharapkan untuk menjawab pertanyaan</h1> <b>'.$pertanyaan.'</b>';
        if(!empty($email)){
            $this->kirimIngatkan($email, $text);
            return redirect()->back()->with('success','Berhasil Mengingatkan Admin!');
        }else{
            return redirect()->back()->with('warning','Data Admin Tidak Ditemukan!');
        }
        
    }

    public function kirimIngatkan($email, $text)
    {
        $mail             = new PHPMailer\PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug  = 1;
        $mail->SMTPAuth   = true;
        $mail->Host       = env('MAIL_HOST');
        $mail->Port       = env('MAIL_PORT');
        $mail->IsHTML(true);
        $mail->Username = env('MAIL_USERNAME');
        $mail->Password = env('MAIL_PASSWORD');
        $mail->SetFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        $mail->Subject = "Segera Jawab Pertanyaan!";
        $mail->Body    = $text;
        $mail->AddAddress($email);
        if ($mail->Send()) {
            return 'Email Sended Successfully';
        } else {
            return 'Failed to Send Email';
        }    
    }
}
