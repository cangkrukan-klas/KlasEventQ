<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 26/07/18
 * Time: 12:07
 */

namespace App\Http\Controllers;


class ProfileController extends Controller
{
    public function index()
    {
        //dd(session('activeUser'));
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }
        return view('BackEnd.profile');
    }

}