<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Registration of the trip
     *
     * @return \Illuminate\Http\Response
     */
    public function tripAction(Request $request){
        $vehicles = DB::select('select id, name, plateNum from transport');
        if($request->isMethod('post')) {
            DB::insert('insert into events (user_id, vehicle_id, destination, terminal_leave,
                terminal_return, client_arrive, client_leave, spidometer_start, spidometer_finish, min_spent)
                values(?,?,?,?,?,?,?,?,?,?)',
                [Auth::user()->id,
                substr($request->input('vehicle'), strpos($request->input('vehicle'), ":") + 2),
                $request->input('destination'),
                $request->input('hour_left').':'.$request->input('minutes_left'),
                $request->input('hour_returned').':'.$request->input('minutes_returned'),
                $request->input('hour_start').':'.$request->input('minutes_start'),
                $request->input('hour_finish').':'.$request->input('minutes_finish'),
                $request->input('spidometer_start'),
                $request->input('spidometer_finish'),
                $request->input('min_spent'),
                ]);

        }
        return view('trip', ['vehicles' => $vehicles]);
    }
}
