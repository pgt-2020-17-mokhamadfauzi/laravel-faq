<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use PHPMailer\PHPMailer;

class Auth extends Controller
{
    public function index()
    {
        if(Session::get('login')){
            if(Session::get('level') == '3'){
                return redirect('/dashboard');
            }elseif(Session::get('level')== '1'){
                return redirect('/admin');
            }elseif(Session::get('level')== '2'){
                return redirect('/admin');
            }
        }else{
            return view('login');
        }
    }

    public function lupapassword()
    {
        if(Session::get('login')){
            if(Session::get('level') == '3'){
                return redirect('/dashboard');
            }elseif(Session::get('level')== '1'){
                return redirect('/admin');
            }elseif(Session::get('level')== '2'){
                return redirect('/admin');
            }
        }else{
            return view('lupapassword');
        }
    }

    public function aktivasi($id)
    {
        if(Session::get('login')){
            if(Session::get('level') == '3'){
                return redirect('/dashboard');
            }elseif(Session::get('level')== '1'){
                return redirect('/admin');
            }elseif(Session::get('level')== '2'){
                return redirect('/admin');
            }
        }else{
            return view('aktivasi',['id'=>$id]);
        }
    }

    public function loginpost(Request $request)
    {
        $nip = $request->nip;
        $password = $request->password;

        $data = ModelUser::where('nip',$nip)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                if($data->level == 1){
                    Session::put('nama', $data->name);
                    Session::put('nip', $data->nip);
                    Session::put('email', $data->email);
                    Session::put('status', $data->status);
                    Session::put('level', $data->level);
                    Session::put('kode_dpt', $data->kode_departement);
                    Session::put('login', TRUE);
                    Session::put('level', $data->level);
                    Session::put('status_menu', $data->status_menu);

                    DB::table('log_login')->insert([
                        'nama' => Session::get('nama'),
                        'nip' => Session::get('nip'),
                        'kode_departement' => Session::get('kode_dpt'),
                        'level' => Session::get('level'),
                        'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                        'waktu' => Carbon::now('Asia/Jakarta')->format('H:i:s'),
                    ]);

                    return redirect('/admin')->with('success', 'Anda Berhasil Login Sebagai Super Admin!');
                }elseif($data->level == 2){
                    Session::put('nama', $data->name);
                    Session::put('nip', $data->nip);
                    Session::put('email', $data->email);
                    Session::put('status', $data->status);
                    Session::put('level', $data->level);
                    Session::put('kode_dpt', $data->kode_departement);
                    Session::put('login', TRUE);
                    Session::put('level', $data->level);
                    Session::put('status_menu', $data->status_menu);

                    DB::table('log_login')->insert([
                        'nama' => Session::get('nama'),
                        'nip' => Session::get('nip'),
                        'kode_departement' => Session::get('kode_dpt'),
                        'level' => Session::get('level'),
                        'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                        'waktu' => Carbon::now('Asia/Jakarta')->format('H:i:s'),
                    ]);

                    return redirect('/admin')->with('success', 'Anda Berhasil Login!');
                }elseif($data->level == 3){
                    Session::put('nama', $data->name);
                    Session::put('nip', $data->nip);
                    Session::put('email', $data->email);
                    Session::put('status', $data->status);
                    Session::put('level', $data->level);
                    Session::put('kode_dpt', $data->kode_departement);
                    Session::put('login', TRUE);
                    Session::put('level', $data->level);
                    Session::put('status_menu', $data->status_menu);

                    DB::table('log_login')->insert([
                        'nama' => Session::get('nama'),
                        'nip' => Session::get('nip'),
                        'kode_departement' => Session::get('kode_dpt'),
                        'level' => Session::get('level'),
                        'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d'),
                        'waktu' => Carbon::now('Asia/Jakarta')->format('H:i:s'),
                    ]);

                    return redirect('/dashboard')->with('success', 'Anda Berhasil Login!');
                }
            }else{
                return redirect()->back()->with('warning','NIP Atau Password Salah!'); }
            }else{
                return redirect()->back()->with('warning','NIP Atau Password Salah!'); }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function lupapasswordpost(Request $request)
    {
        $email = $request->email;
        $validasi = DB::table('model_users')->where('email',$email)->first();
        if(empty($validasi)){
            return redirect()->back()->with('warning','Email yang anda masukan tidak terdaftar!');
        }else{
            $code = Crypt::encryptString($email);
            $url = env('APP_URL').'/resetpassword/'.$code;
            $text = '<h1>Silahkan Reset Password Anda</h1><a href="'.$url.'">Reset Password</a>';

            $this->kirimAktivasi($text, $email);
            return redirect()->back()->with('success','Silahkan Cek Email Anda!');
        }
    }

    public function kirimAktivasi($text, $email)
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
        $mail->Subject = "Activation Password";
        $mail->Body    = $text;
        $mail->AddAddress($email);
        if ($mail->Send()) {
            return 'Email Sended Successfully';
        } else {
            return 'Failed to Send Email';
        }    
    }

    public function aktivasipost(Request $request)
    {
        $code = Crypt::decryptString($request->code);
        $password = $request->password;
        $password1 = $request->password1;

        if($password != $password1){
            return redirect()->back()->with('warning','Password Tidak Sama!');
        }else{
            DB::table('model_users')->where('email',$code)->update([
                'password' => bcrypt($password),
            ]);
            return redirect('/')->with('success','Password Berhasil Dirubah!');
        }
    }
}
