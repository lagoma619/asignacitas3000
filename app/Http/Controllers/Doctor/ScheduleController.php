<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkDay;

class ScheduleController extends Controller
{


    public function dias(){
        $days = [
            'Lunes', 'Martes','Miércoles', 'Jueves', 'Viernes', 'Sábado','Dómingo'
        ];
        return $days;
    }
    public function edit(){
        //$days = ['Lunes', 'Martes','Miércoles', 'Jueves', 'Viernes', 'Sábado','Dómingo'];
        $days = $this->dias();
        $workDays = WorkDay::where('user_id', auth()->id())->get();
        //dd($workDays->toArray());
        return view('schedule',compact('workDays','days'));
    }

    public function store(Request $request){
    //dd($request->all());
        //  dd($request->input('active'));
        //dd($request->input('morning_start'));


        $active = $request->input('active') ?: [];  //si es null crea un arreglo vacío
        $morning_start  = $request->input('morning_start');
        $morning_end = $request->input('morning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');
        //dd($morning_start);

        for ($i=0; $i<7; ++$i)
            WorkDay::updateOrCreate([
                'day'=> $i,
                'user_id'=>auth()->id()
            ],
                [
                'active'=> in_array($i, $active),
                'morning_start'=>  $morning_start[$i],
                'morning_end'=> $morning_end[$i],
                'afternoon_start'=> $afternoon_start[$i],
                'afternoon_end'=> $afternoon_end[$i]

            ]);
        return back();
    }

}
