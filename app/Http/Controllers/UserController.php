<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Theatre;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDO;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function home(Request $request){
        $movies = null;
        if($request->search){
            $movies = Movie::where('movie_name','LIKE','%'.$request->search.'%')->paginate(12);
        }
        else{
            $movies = Movie::paginate(12);
        }
        return view('home', compact('movies'));

    }

    public function theatre(Request $request){
        $theatres = null;
        if($request->search){
            $theatres = Theatre::where('theatre_name','LIKE','%'.$request->search.'%')->paginate(15);
        }
        else{
            $theatres = Theatre::paginate(15);
        }

        return view('theatre', compact('theatres'));
    }

    public function login_page(){
        return view('login');
    }

    public function login(Request $request){
        $rules = [
            'user_email' => 'required|email',
            'password' => 'required|min:6|max:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $credentials = [
            'email' => $request->user_email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }else{
            return back()->withErrors("Wrong credentials");
        }
    }

    public function register_page(){
        return view('registration');
    }

    public function register(Request $request){
        $rules = [
            'users_name' => 'required|min:5|max:50',
            'email' => 'required|email',
            'phone_number' => 'required|min:12',
            'pin' => 'required|min:6|max:6',
            'retype_pin' => 'required|same:pin'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $data = [
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'users_name' => $request->users_name,
            'password' => bcrypt($request->pin),
            'user_role' => 'member'
        ];
        DB::table('users')->insert($data);
        return redirect()->route('login_page');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function tickets($member_id){
        $data = DB::table('tickets')
        ->select('tickets.ticket_id','tickets.movie_time','movies.movie_name as movie_name','theatres.theatre_name as theatre_name')
        ->join('movies','movies.movie_id','=','tickets.movie_id')
        ->join('theatres','theatres.theatre_id','=','tickets.theatre_id')
        ->where('tickets.users_id','LIKE',$member_id)
        ->get();

        return view('tickets', compact('member_id','data'));
    }
}
