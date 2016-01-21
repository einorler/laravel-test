<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Transport;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/panel');
    }
    public function transportAction(Request $request){
        if($request->isMethod('post')){
            $name = $request->input('name');
            $number = $request->input('nr');
            $statConsumption = $request->input('statConsumption');
            $loadConsumption = $request->input('loadConsumption');
            $movingConsumption = $request->input('movingConsumption');
            DB::insert('insert into transport (plateNum, name,  stat_consumption,  load_consumption,  moving_consumption ) values (?, ?, ?, ?, ?)',
                [$number, $name, $statConsumption, $loadConsumption, $movingConsumption]);
        }
        $data = DB::select('select * from transport');
        $vehicles = [];
        foreach($data as $vehicle){
            $vehicles[$vehicle->id] = new Transport();
            $vehicles[$vehicle->id]->setId($vehicle->id);
            $vehicles[$vehicle->id]->setName($vehicle->name);
            $vehicles[$vehicle->id]->setPlateNum($vehicle->plateNum);
            $vehicles[$vehicle->id]->setStatConsumption($vehicle->stat_consumption);
            $vehicles[$vehicle->id]->setLoadConsumption($vehicle->load_consumption);
            $vehicles[$vehicle->id]->setMovingConsumption($vehicle->moving_consumption);
        }
        return view('admin/transport', ['vehicles' => $vehicles]);
    }
    public function usersAction(){
        $users = DB::select('select first_name, last_name, email from users');
        return view('admin/users', ['users'=>$users]);
    }

    public function reportsAction(Request $request){
        $users = DB::select('select id, first_name, last_name, email from users');

        if($request->isMethod('post')) {
            $id = substr($request->input('email'), strpos($request->input('email'), ":") + 2);
            $year =$request->input('year');
            $month =$request->input('month');

            $events = DB::select('select users.first_name, events.*, transport.name as t_name, transport.load_consumption,
                  transport.moving_consumption, transport.stat_consumption
                  from users inner join events on users.id = events.user_id
                  left join transport on events.vehicle_id = transport.id
                  where year(events.date) = ? and month(events.date) = ?
                  AND users.id = ?', [$year, $month, $id]);
            $calc = [];
            foreach ($events as $event) {
                $parsed_arrive = date_parse($event->client_arrive);
                $parsed_leave = date_parse($event->client_leave);
                $hours['arrive'] = $parsed_arrive['hour'] + $parsed_arrive['minute'] / 60;
                $hours['leave'] = $parsed_leave['hour'] + $parsed_leave['minute'] / 60;
                $hours['actual'] = $hours['leave'] - $hours['arrive'] - $event->min_spent / 60;


                $calc[$event->id]['distance'] = (int)$event->spidometer_finish - (int)$event->spidometer_start;
                $calc[$event->id]['fuel'] = $calc[$event->id]['distance'] / 100 * $event->moving_consumption + $event->min_spent / 60 * $event->load_consumption
                    + $hours['actual'] * $event->stat_consumption;
            }
//        die(var_dump($calc));
            return view('admin/reports', ['events' => $events, 'calc' => $calc, 'users' => $users]);
        }

        return view('admin/reports', ['users' => $users]);
    }
}
