<?php
/**
 * Created by PhpStorm.
 * User: nathanael79
 * Date: 25/07/18
 * Time: 1:34
 */

namespace App\Http\Controllers\BackEnd\Database\Event;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventParticipant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Validator;

class EventController extends Controller
{
    public function index()
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        return view('BackEnd.Database.Event.event');
    }

    public function getDataTable()
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        return DataTables::of(Event::all())->make(true);
    }

    public function getDetail(Request $request)
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        $data = [
            'event' => DB::table('q_event')->where('id', $request->id)->first()
        ];
        return response()->json($data);
    }

    public function create()
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        $data = [
            'category' => DB::table('category')->get(),
            'regency' => DB::table('regencies')->get(),
            'province'=> DB::table('provinces')->get(),
        ];

        return view('BackEnd.Database.Event.insert',$data);
    }

    public function store(Request $request)
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        if($request->file("photo"))
        {
            $time = Carbon::now();
            $extension = $request->file('photo')->getClientOriginalExtension();
            $directory = 'Event/';
            $filename = str_slug($request->input('name')).'-'.date_format($time,'d').rand(1,999).date_format($time,'h').".".$extension;
            $upload_success = $request->file("photo")->storeAs($directory,$filename,'public');
        }
        else
        {
            $filename = '';
        }

        Validator::make($request->only(['name','address','regency_id','price','start_date','end_date','confirmation_date','status']),[
            'name'=>'required',
            'address'=>'required',
            'regency_id'=>'required',
            'price'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'confirmation_date'=>'required',
            'status'=>'required',
        ]);

        $activeEvent = Event::where('name',$request->name)->first();
        if(is_null($activeEvent))
        {
            $event =[
                'name'=>$request->name,
                'address'=>$request->address,
                'regency_id'=>$request->regency_id,
                'price'=>$request->price,
                'quota'=>$request->quota,
                'category_id'=>$request->category_id,
                'start_date'=> date('Y-m-d H:i:s',strtotime($request->start_date)),
                'end_date'=>date('Y-m-d H:i:s',strtotime($request->end_date)),
                'description'=>$request->description,
                'confirmation_date'=>date('Y-m-d H:i:s',strtotime($request->confirmation_date)),
                'photo'=>$filename,
                'status'=>$request->status,
                'avail'=>"1",
            ];
            if(Event::create($event))
            {
                return view("BackEnd.Database.Event.event");
            }
        }
        else
        {
            echo "event telah ada";
        }
    }

    public function edit($id)
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        $data=[
            'event' => Event::find($id),
            'category' => DB::table('category')->get(),
            'regencies'=> DB::table('regencies')->get(),
        ];
        return view('BackEnd.Database.Event.edit',$data);
    }

    public function update(Request $request, $id)
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        if($request->file("photo"))
        {
            $time = Carbon::now();
            $extension = $request->file('photo')->getClientOriginalExtension();
            $directory = 'Event/';
            $filename = str_slug($request->input('name')).'-'.date_format($time,'d').rand(1,999).date_format($time,'h').".".$extension;
            $upload_success = $request->file("photo")->storeAs($directory,$filename,'public');
        }
        else
        {
            $filename = '';
        }

        //$activeEvent = Event::find($name);

        $event =[
            'name'=>$request->name,
            'address'=>$request->address,
            'regency_id'=>$request->regency_id,
            'price'=>$request->price,
            'quota'=>$request->quota,
            'category_id'=>$request->category_id,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'description'=>$request->description,
            'confirmation_date'=>$request->confirmation_date,
            'photo'=>$filename,
            'status'=>$request->status,
        ];

        Validator::make($event,[
            'name'=>'required',
            'address'=>'required',
            'regency_id'=>'required',
            'price'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'description'=>'required',
            'confirmation_date'=>'required',
            'status'=>'required',
        ]);

        if(Event::find($id)->update($event))
        {
            return redirect('/admin/event');
        }
    }

    public function delete($id)
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        if(Event::destroy($id))
        {
            return view("BackEnd.Database.Event.event");
        }

    }

    public function getDataTableList($id)
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        $list = DB::table('event_participant')
            ->join('user','user.id','=','event_participant.user_id')
            ->select('user.name','user.email')
            ->where('event_id',$id)
            ->get();

        //return DataTables::eloquent($list)->make(true);
        dd($list);

        //return DataTables::of($list)->make(true);
    }

    public function list_peserta($id)
    {
        if(session('activeUser') == null) {
            //return redirect()->back();
            return redirect('/');
        }

        if(session('activeUser')->user_role == 1) {
            //return redirect('/admin/profile');
        } else {
            return redirect('/login');
        }

        $event = Event::where('id',$id)->first();

        return view('BackEnd.Database.Event.list_peserta',$event);

        //return DataTables::of($list)->make(true);

        //foreach ($list->name as $key =>$list->email)
        //{
            //echo "email ini ($list->email) adalah milik $list->name";
            //echo "<br/>";
        //}
    }

    public function hehe() {
        $triEvent = Event::limit(3)->get();
        $event = Event::get();
        $user = User::get();
        return view('hehe',compact('triEvent','event','user'));
    }
}