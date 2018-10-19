<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 07/08/18
 * Time: 17:18
 */

namespace App\Http\Controllers\API;

use App\Mail\EventConfirmEmail;
use App\Models\Event;
use App\Models\EventParticipant;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApiEventParticipantController extends Controller
{
    public function register(Request $request)
    {
        $event = $request->event_id;
        $user = $request->user_id;
        $activeUser = User::where('id',$user)->first();
        $activeEvent = Event::where('id',$event)->first();
        $registeredUser = EventParticipant::where('user_id',$user)->where('event_id',$event)->first();
        $registered = EventParticipant::where('user_id',$user)->where('event_id',$event)->get()->count();
        $totalEvent =$activeEvent->get()->count();
        $token = str_random(100);

        //apabila melebihi start date
        if(Carbon::now() < Carbon::parse($activeEvent->start_date))
        {
            //apabila melebihi confirmation date
            if(Carbon::now() < Carbon::parse($activeEvent->confirmation_date))
            {
                //apabila melebihi quota
                if($activeEvent->quota > $registered)
                {
                    //apabila user belum terdaftar pada event tersebut
                    if(is_null($registeredUser))
                    {
                        $eventparticipant= [
                            "user_id" => $request->user_id,
                            "event_id" => $request->event_id,
                            "attendance" => null,
                            "token"=>$token
                        ];

                        //mengirim email konfirmasi kehadiran
                        
                        if(EventParticipant::create($eventparticipant))
                        {
//                        return back()->with('alert-success', 'Berhasil Kirim Email');

                            Mail::to($activeUser->email)->send(new EventConfirmEmail($event,$token));
                            return response()->json([
                                "status"=>true,
                                "code"=>200,
                                "message"=>"berhasil mendaftar",
                                "data"=>$eventparticipant
                            ]);
                        }
                        else
                        {
                            return response()->json([
                                "status"=>false,
                                "code"=>204,
                                "message"=>"gagal mendaftar pada event ini",
                                "data"=>null
                            ]);
                        }
                    }
                    else
                    {
                        return response()->json([
                            "status"=>false,
                            "code"=>203,
                            "message"=>"Anda sudah terdaftar pada user ini",
                            "data"=>null
                        ]);
                    }

                }
                else
                {
                    $activeEvent->avail = 0;
                    $activeEvent->save();
                    return response()->json([
                        "status"=>false,
                        "code"=>202,
                        "message"=>"Kuota untuk Event ini telah terpenuhi",
                        "data"=>$activeEvent->avail,
                        "datenow"=>Carbon::now()
                    ]);
                }

            }
            else
            {
                $activeEvent->avail = 0;
                $activeEvent->save();
                return response()->json([
                    "status"=>false,
                    "code"=>201,
                    "message"=>"Anda tidak bisa mendaftar pada event ini karena telah melebihi batas tanggal konfirmasi",
                    "data"=>$activeEvent->avail,
                    "datenow"=>Carbon::now()
                ]);
            }
        }
        else
        {
            $activeEvent->avail = 0;
            $activeEvent->save();
            return response()->json([
                "status"=>false,
                "code"=>500,
                "message"=>"Anda tidak bisa mendaftar pada Event ini",
                "data"=>$activeEvent->avail,
                "datenow"=>Carbon::now(),
                "dateDB"=>Carbon::parse($activeEvent->start_date)
            ]);
        }

    }

    /*public function getQuota(Request $request)
    {
        $quota = Event::where('id',$request->event_id)->first();
        return response()->json([
            "data"=>$quota->quota,
        ]);

        //$quota = Event::where('id',$request->event_id)->first();
        //dd($quota[0]->quota);
    }*/

    public function show(Request $request)
    {
        $registeredEvent = Eventparticipant::all();
        return response()->json([
            "status"=> true,
            "code"=>200,
            "message"=>"data berhasil ditampilkan",
            "data"=>$registeredEvent,
        ]);
    }


    public function showById($id)
    {
        //$event_id = EventParticipant::where('user_id',$id)->select('event_id')->get();
        $event_name = DB::table('event_participant')
            ->join('event', 'event_participant.event_id','=','event.id')
            ->select('event.*')
            ->where('event_participant.user_id','=',$id)
            ->orderBy('date_created','ASC')
            ->get();
        if($event_name)
        {
            return response()->json([
                "status" => true,
                "code"=>200,
                "message"=>"data berhasil ditampilkan",
                "data" => $event_name
            ]);
        }
        else
        {
            return response()->json([
                "status"=>false,
                "code"=>500,
                "message"=>"data gagal ditampilkan"
            ]);
        }
    }

}