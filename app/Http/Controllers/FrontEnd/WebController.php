<?php

namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Support\Facades\Mail;
use Session;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller {
	public function WebIndex(Request $request)
    {
        //test session
    	if($request->session()->get('activeUser')) {
    		$loginstatus=array('status' => 1, 'test' => "apa gitu" );
    	} else {
    		$loginstatus=array('status' => 0, 'test' => "apa gitu2");
    	}

        //event carrousel
        $triEvent = Event::limit(3)->get();

        //get event seperti di /events
        $event = Event::all()->where('status', 'Published');
        $user = User::get();
        
        return view('FrontEnd.index',compact('triEvent', 'event','user', 'loginstatus'));
    }

    public function EventIndex()
    {
        return view('FrontEnd.events', ['event' => Event::all()->where('status', 'Published')]);
    }

    public function EventSingleIndex($id)
    {
        return view('FrontEnd.singleevent', ['event' => Event::find($id)]);
    }

    public function JoinEvent(Request $request, $id)
    {
        $sisa_kuota = CheckQuota($id);

        //jika sisa kuota lebih dari 0 maka bisa daftar
        if ($sisa_kuota>0){

        } else {
            //jika tidak bisa daftar
        }
    }

    public function AboutIndex()
    {
        return view('FrontEnd.about');
    }

    /*public function LoginIndex()
    {
        return view('Frontend.login');
    }

    public function RegisterIndex()
    {
        return view('Frontend.register');
    }

    public function LoginUser(Request $request)
    {
        $email = $request->input('email');
        $password = sha1($request->input('password'));

        $activeUser = User::where([
            'email'=>$email,
            'password'=>$password
        ])->firstOrFail();

        if($activeUser->status == 1) {
            if (is_null($activeUser)) {
                return "Pengguna Tidak Ditemukan!";
            } else {
                if ($activeUser->password != $password) {
                    return "Password Salah!";
                } else {
                    $request->session()->put('activeUser', $activeUser);
                    return redirect("/");
               }
            }
        }
        else
        {
            return "Anda belum konfirmasi email.";
        }
    }*/

    public function LogoutUser(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function ProfileIndex(Request $request){
        //kembalikan data user ke view
        
    }

    public function UpdateProfile(Request $request){
        //update profil
    }

    public function ChangePassword(){
        //ubah password
        $activeUser = User::where('email', $request->email)->first();

    }

    /*public function RegisterUser(Request $request)
    {
        $activeUser = User::where('email', $request->email)->first();
        $token = str_random(100);
        
        //jika belum terdaftar
        if (is_null($activeUser)) {
            $user =
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => sha1($request->password),
                    'gender' => $request->gender,
                    'status' => 0,
                    'token' => $token,
                ];

            Validator::make($user, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|string|max:255|unique:user',
                'password' => 'required|string|min:6|confirmed',
                'gender' => 'required|string',
            ]);

            if (User::create($user)) {
                //buat user
                try {
                    //kirim email
                    Mail::send('email', ['token' => $token, 'name' => $request->name, 'email' => $request->email], function ($message) use ($request) {
                        $message->subject('Konfirmasi Pendaftaran User Baru');
                        $message->from('cangkrukanklas18@gmail.com', 'Kelompok Linux Arek Suroboyo (KLAS)');
                        $message->to($request->email);
                    });
                    return back()->with('alert-success', 'Berhasil Kirim Email');
                } catch (Exception $e) {
                    //tidak bisa kirim email
                    return response(['status' => false, 'errors' => $e->getMessage()]);
                    return view('Frontend.login');
                }
            } else {
                //tidak bisa buat user
                echo "tidak bisa buat user";
            }
        } else {
            echo "active user";
            //redirect('/error') ;
        }
    }*/


    public function ValidateUser(Request $request){
        if($email == "" && $address == "" && $name == "" && $gender== "" && $birthdate == "" && $regency_id == ""){
            //melengkapi data dulu
        } else {
            //bisa kemana2, pilih event
            //return true;
        }
    }

    public function CheckQuota(Request $request, $id){
        //hitung kuota asli - jumlah peserta yang daftar
        $eventkuota = Event::where('id',$id)->select('quota')->get();
        $pendaftar = EventParticipant::where('event_id',$id)->where('user_id')->get()->count();
        $sisa_kuota = $eventkuota[0]->quota - $pendaftar ;
        
        return $sisa_kuota;
    }

    public function CheckSession(Request $request){
        //cek apakah ada session di sini?
        if($request->session()->get('activeUser')){
            //jika ada, tergantung view bagaimana
            //  - bisa ada tampilan profile di menu bar
            //  - bisa ambil data dari session
        } else {
            //jika tidak,
            // - tampilan tetep ada loginnya
            // - yu
        }

    }

}