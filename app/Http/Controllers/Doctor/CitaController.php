<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cita;
use Carbon\Carbon;
class CitaController extends Controller
{
     private $dias =[
        'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'
    ];
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $active=$request->input('active')?:[];
        $mañanainicio=$request->input('mañanainicio');
        $mañanafin=$request->input('mañanafin');
        $tardeinicio=$request->input('tardeinicio');
        $tardefin=$request->input('tardefin');
         
        $errors=[];

        for($i=0;$i<7;++$i){
            if($mañanainicio[$i]>$mañanafin[$i]){
                $errors[]='El intervalo de las horas del turno de la mañana del dia'.$this->dias[$i].'.';
            }
            if($tardeinicio[$i]>$tardefin[$i]){
                $errors[]='El intervalo de las horas del turno de la tarde del dia'.$this->dias[$i].'.';
            }
        cita::updateOrCreate(
            [
                'dia'=>$i,
                'user_id'=>auth()->id()
            ],
            [
                'active'=>in_array($i,$active),
                'mañanainicio'=>$mañanainicio[$i],
                'mañanafin'=>$mañanafin[$i],
                'tardeinicio'=>$tardeinicio[$i],
                'tardefin'=>$tardefin[$i],
            ]
        );
        }
    if(count($errors)>0)
        return back()->with(compact('errors'));

    $notification= 'Los cambios se hana guardado correctamente.';
         return back()->with(compact('notification'));
    }

    public function show($id)
    {
        //
    }

   
    public function edit()
    {
        
        $horario =cita::where('user_id',auth()->id())->get();
        $horario->map(function($horario){
            $horario->mañanainicio=(new Carbon($horario->mañanainicio))->format('g:i A');
            $horario->mañanafin=(new Carbon($horario->mañanafin))->format('g:i A');
            $horario->tardeinicio=(new Carbon($horario->tardeinicio))->format('g:i A');
            $horario->tardefin=(new Carbon($horario->tardefin))->format('g:i A');
        });
        $dias=$this->dias;
        return view('cita',compact('dias','horario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
