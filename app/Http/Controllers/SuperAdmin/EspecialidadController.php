<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\especialidad;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;
class EspecialidadController extends Controller
{
    
    public function index(Request $request){
        $buscar= $request->buscar;
        $especialidades=especialidad::where('nombre','LIKE','%'.$buscar.'%')
        ->orWhere('descripcion','LIKE','%'.$buscar.'%')
        ->latest('id')
        ->paginate(1);
        $data=[
            'especialidades'=>$especialidades,
            'buscar'=>$buscar,

        ];
        return view('especialidad.index',$data);
    }
    public function create(){
        return view('especialidad.create');
    }
    public function sendData(Request $request){
        $rules=['nombre'=>'required|min:3'];
        $messages=['nombre.required '=>'El nombre de la especialidad es obligatorio.','nombre.min'=>'El nombre de la especialidad debe tener mas de 3 letras.'];

      
        $this->validate($request,$rules,$messages);
        
        $especialidad=new especialidad();
        $especialidad->nombre=$request->input('nombre');
        $especialidad->descripcion=$request->input('descripcion');
        $especialidad->save();
        $notifications='La especialidad se a creado corectamente.';

        return redirect('/especialidades')->with(compact('notifications'));
    }

    public function edit(Especialidad $especialidad){
        return view('especialidad.edit',compact('especialidad'));
    }

    public function update(Request $request,Especialidad $especialidad){
        $rules=['nombre'=>'required|min:3'];
        $messages=['nombre.required '=>'El nombre de la especialidad es obligatorio.','nombre.min'=>'El nombre de la especialidad debe tener mas de 3 letras.'];

      
        $this->validate($request,$rules,$messages);
        
       
        $especialidad->nombre=$request->input('nombre');
        $especialidad->descripcion=$request->input('descripcion');
        $especialidad->save();
        $notifications='La especialidad se actualizo correctamente';

        return redirect('/especialidades')->with(compact('notifications'));
    }
    public function destroy(Especialidad $especialidad){
        $deleteName=$especialidad->nombre;
        $especialidad->delete();
        $notification='La especialidad '.$deleteName.' se ha elimino correctamente';
        return  redirect('/especialidades')->with(compact('notification'));
    }
    public function pdf()
    {
       $especialidad=Especialidad::paginate();
       $pdf = Pdf::loadView('especialidad.pdf', ['especialidad' => $especialidad]);
       return $pdf->stream();
    }
}
