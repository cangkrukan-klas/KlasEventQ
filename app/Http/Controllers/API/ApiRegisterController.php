<?php
/**
 * Created by PhpStorm.
 * Auth: nathanael79
 * Date: 23/07/18
 * Time: 23:44
 */

namespace App\Http\Controllers\API;

use App\Mail\RegisterEmail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Array_;

class ApiRegisterController extends Controller
{
    public function create(Request $request)
    {
        if($request->email && $request->password){
            $activeUser = User::where('email',$request->email)->first();
            if(is_null($activeUser))
            {
                $token = str_random(100);

                $file = asset('Images\Account\default.png');

                $user =
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => sha1($request->password),
                        'gender'=>$request->gender,
                        'status' => 0,
                        'token' => $token,
                        'photo' => $file
                    ];

                Validator::make($user, [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|string|max:255|unique:user',
                    'password' => 'required|string|min:6|confirmed',
                    'gender'=> 'required'
                ]);

                if (User::create($user))
                {
                    //Mail::to($request->email)->send(new RegisterEmail($request->name, $token, $request->email));
                    Mail::to($request->email)->send(new RegisterEmail($request->name,$token,$request->email));
                    return response()->json([
                        "status"=>true,
                        "code"=>200,
                        "message"=>"berhasil"
                    ]);
                }
                else
                {
                    return response()->json([
                        "status"=>false,
                        "code"=>500,
                        "message"=>"gagal membuat user"
                    ]);
                }
            }
            else
            {
                return response()->json([
                    "status"=>false,
                    "code"=>250,
                    "message"=>"user telah ada"
                ]);
            }
        }
        else
        {
            return response()->json([
                "status"=>"false",
                "code"=>251,
                "message"=>"email atau password belum diinputkan"
            ]);
        }

        /*
        if($request->email && $request->password)
        {
            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>sha1($request->password),
            ]);

            return response()->json([
                "status"=>'true',
                "code"=>200
            ]);
        }
        else
        {
            return response()->json([
               "status"=>"gagal",
               "code"=>500,
            ]);
        }*/
    }
}