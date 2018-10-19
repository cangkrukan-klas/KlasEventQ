<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 13/08/18
 * Time: 20:39
 */

namespace App\Http\Controllers;


use App\Models\EventParticipant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function regis_confirm($email, $token)
    {
        $user = User::where('email',$email)->where('token',$token)->first();
        if($user)
        {
            $user->status = 1;
            $user->token = 0;
            $user->save();
            if($user->user_role == 1)
            {
                return view('FrontEnd.emailverification');
            }
            else
            {
                redirect('FrontEnd.emailverification');
            }
        }
        else
        {
           redirect('/error');
        }
    }

    public function event_confirm($event_id, $token)
    {
        //$registeredUser = EventParticipant::where('user_id',$user_id)->where('event_id',$event_id)->first();
        $registerUser = EventParticipant::where('event_id', $event_id)->where('token', $token)->first();
        if ($registerUser)
        {
            $registerUser->token = 0;
            $registerUser->attendance = 1;
            $registerUser->save();
            return view('FrontEnd.emailverification'); //direturn ke view event dengan tampilan sudah registered
        }
    }

    public function update_profile($token, $user)
    {
        $updatedUser = $user;
        if($updatedUser)
        {
            $updatedUser->status = 1;
            $updatedUser->token = null;
            $updatedUser->save();

            if($updatedUser->user_role == 1)
            {
                redirect('/admin/profile');
            }
            else
            {
                redirect('/profile');
            }
        }
        else
        {
            redirect('/error');
        }
    }
}