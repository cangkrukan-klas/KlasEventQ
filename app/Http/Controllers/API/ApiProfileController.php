<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 07/08/18
 * Time: 21:19
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use App\Mail\UpdateProfileEmail;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApiProfileController extends Controller
{
    public function getRegenciesId()
    {
        return response()->json([
            'status'=>true,
            'code'=>200,
            'data'=>DB::table('regencies')->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        //$user = User::where('id',$id);
        $user = User::find($id);
        $token = str_random(100);
        $password = sha1($request->password);

        /*$this->validate($request,[
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required|string|min:6|confirmed',
            'gender'=>'required|string'
        ]);*/

        if($user!=null)
        {
            if($request->email != $user->email)
                {
                    if($request->file('photo'))
                    {
                        $time = Carbon::now();
                        $extension = $request->file('photo')->getClientOriginalExtension();
                        $directory = 'Account/';
                        $filename = str_slug($request->input('name')) . '-' . date_format($time, 'd') . rand(1, 999) . date_format($time, 'h') . "." . $extension;
                        $upload_success = $request->file("photo")->storeAs($directory, $filename, 'public');

                        $user->update([
                            "name"=>$request->name,
                            "email"=>$request->email,
                            "address"=>$request->address,
                            "gender"=>$request->gender,
                            "regency_id"=>$request->regency_id,
                            "photo"=>$filename,
                            "status"=>0,
                            "token"=>$token
                        ]);

                        Mail::to($request->email)->send(new RegisterEmail($request->name,$token,$request->email));

                        return response()->json([
                            "status"=>true,
                            "code"=>200,
                            "message"=>"berhasil update user menggunakan foto",
                            "data"=>$user
                        ]);
                    }
                    else
                    {
                        $user->update([
                            "name"=>$request->name,
                            "email"=>$request->email,
                            "address"=>$request->address,
                            "gender"=>$request->gender,
                            "regency_id"=>$request->regency_id,
                            //"photo"=>$filename,
                            "status"=>0,
                            "token"=>$token
                        ]);

                        Mail::to($request->email)->send(new RegisterEmail($request->name,$token,$request->email));

                        return response()->json([
                            "status"=>false,
                            "code"=>300,
                            "message"=>"berhasil update tanpa menggunakan foto"
                        ]);
                    }
                }
                else
                {
                    if($request->file('photo'))
                    {
                        $time = Carbon::now();
                        $extension = $request->file('photo')->getClientOriginalExtension();
                        $directory = 'Account/';
                        $filename = str_slug($request->input('name')) . '-' . date_format($time, 'd') . rand(1, 999) . date_format($time, 'h') . "." . $extension;
                        $upload_success = $request->file("photo")->storeAs($directory, $filename, 'public');

                        $user->update([
                            "name"=>$request->name,
                            "email"=>$request->email,
                            "address"=>$request->address,
                            "gender"=>$request->gender,
                            "regency_id"=>$request->regency_id,
                            "photo"=>$filename
                        ]);

                        return response()->json([
                            "status"=>false,
                            "code"=>400,
                            "message"=>"Email yang dimasukkan sama menggunakan foto berhasil diupdate"
                        ]);
                    }
                    else
                    {
                        $user->update([
                            "name"=>$request->name,
                            "email"=>$request->email,
                            "address"=>$request->address,
                            "gender"=>$request->gender,
                            "regency_id"=>$request->regency_id,
                            //"photo"=>$filename
                        ]);

                        return response()->json([
                            "status"=>false,
                            "code"=>401,
                            "message"=>"Email yang dimasukkan sama tanpa menggunakan foto berhasil diupdate"
                        ]);
                    }
                }
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $oldPassword = sha1($request->oldpassword);
        $newPassword = sha1($request->newpassword);
        //$token = str_random(100);
        $user = User::where('id',$id)->first();
        if($oldPassword == $user->password)
        {
            $user->password = $newPassword;
            //$user->token = $token;
            //$user->status = 0;

            if ($user->save()) {

                //tambah email
                return response()->json([
                    "status" => true,
                    "code" => 200,
                    "message" => "berhasil diupdate password",
                    "data" => $user
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "code" => 500,
                    "message" => "gagal update password"
                ]);
            }
        }
        else
        {
            return response()->json([
                "status"=>false,
                "code"=>300,
                "message"=>"password lama dan baru tidak cocok"
            ]);
        }
    }

    public function show() //Read All
    {
        //User::update()->all()
        return response()->json([
            'status'=>'berhasil',
            'code'=>200,
            'data'=>User::all()
        ]);
    }

    public function detailuser($id)
    {
        $cekuser=User::where(['id'=>$id])->first();
        if (is_null($cekuser))
        {
            return response()->json([
                'code' => 500,
                'status'=>false,
                'message' => 'data user gagal ditampilkan',
            ]);
        }
        else
        {
            if($cekuser->photo != null)
            {
                return response()->json([
                    'code' => 200,
                    'status' => true,
                    'message' => 'data user berhasil ditampilkan dengan foto',
                    'data' => $cekuser
                ]);
            }
            else
            {
                return response()->json([
                   "status"=>false,
                   "code"=>300,
                   "message"=>"data user berhasil ditampilkan tanpa foto",
                    "data"=>$cekuser
                ]);
            }
        }
    }
}