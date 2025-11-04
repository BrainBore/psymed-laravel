<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Models\doctor;
use Laravel\Ui\Presets\React;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;
class DoctorController extends Controller
{
    
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        $doctores=doctor::where('nombre','LIKE','%'.$buscar.'%')
        ->orWhere('coddoctor','LIKE','%'.$buscar.'%')
        ->latest('id')
        ->paginate(4);
        $data=[
            'doctores'=>$doctores,
            'buscar'=>$buscar,

        ];
        return view('doctor.index',$data);
    }

    
    public function create()
    {
        return view('doctor.create');
    }

   
    public function store(Request $request)
    {
        $roles=[
            'coddoctor'=>'required',
            'nombre'=>'required|min:1',
            'apPaterno'=>'required|min:1',
            'apMaterno'=>'required|min:1',
            'celula'=>'nullable|min:6',
            'telefono'=>'required',
            'dirreccion'=>'required',
        ];
        $messages=[
            'coddoctor.required'=>'El codigo del medico es obligatorio',
            'nombre.required'=>'El nombre del medico es obligatorio',
            'nombre.min'=>'El nombre del medico debe tener mas de 1 letras',
            'apPaterno.required'=>'El apellido paterno del medico es obligatorio',
            'apPaterno.min'=>'El apellido paterno del medico debe tener mas de 1 letras',
            'apMaterno.required'=>'El apellido materno del medico es obligatorio',
            'apMaterno.min'=>'El apellido materno del medico debe tener mas de 1 letras',
            'celula.required'=>'La celula es obligatorio',
            'celula.min'=>'La celula debe tener mas de 6 digitos',
            'telefono.required'=>'El numero de telefono es obligatorio',
            'dirreccion.required'=>'La dirrecion del doctor es obligatorio es obligatorio',
            
        ];
        $this->validate($request,$roles,$messages);
        doctor::create(
            $request->only('coddoctor','nombre','apPaterno','apMaterno','celula','telefono','dirreccion')
          
        );
        $notification='El medico se ha registrado correctamente';
        return redirect('/medicos')->with(compact('notification'));
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $doctors=doctor::findOrFail($id);
        return view('doctor.edit',compact('doctors'));
    }

    public function update(Request $request, $id)
    {
        $roles=[
            'coddoctor'=>'required',
            'nombre'=>'required|min:1',
            'apPaterno'=>'required|min:1',
            'apMaterno'=>'required|min:1',
            'celula'=>'nullable|min:6',
            'telefono'=>'required',
            'dirreccion'=>'required',
        ];
        $messages=[
            'coddoctor.required'=>'El codigo del medico es obligatorio',
            'nombre.required'=>'El nombre del medico es obligatorio',
            'nombre.min'=>'El nombre del medico debe tener mas de 1 letras',
            'apPaterno.required'=>'El apellido paterno del medico es obligatorio',
            'apPaterno.min'=>'El apellido paterno del medico debe tener mas de 1 letras',
            'apMaterno.required'=>'El apellido materno del medico es obligatorio',
            'apMaterno.min'=>'El apellido materno del medico debe tener mas de 1 letras',
            'celula.required'=>'La celula es obligatorio',
            'celula.min'=>'La celula debe tener mas de 6 digitos',
            'telefono.required'=>'El numero de telefono es obligatorio',
            'dirreccion.required'=>'La direccion del domicilio es obligatorio',
            
        ];
        $this->validate($request,$roles,$messages);
        $doctors=doctor::findOrFail($id);

        $data= $request->only('coddoctor','nombre','apPaterno','apMaterno','celula','telefono','dirreccion');

        $doctors->fill($data);
        $doctors->save();
        $notification='La informacion del medico se actualizo correctamente';
        return redirect('/medicos')->with(compact('notification'));
    }

   
    public function destroy($id)
    {
        $doctors=doctor::findOrFail($id);
        $doctorName=$doctors->nombre;
        $doctors->delete();
        $notifications="El medico $doctorName ha sido eliminado";
        return redirect('/medicos')->with(compact('notifications'));
    }
    public function pdf()
    {
       $doctor=doctor::paginate();
       $pdf = Pdf::loadView('doctor.pdf', ['doctor' => $doctor]);
       return $pdf->stream();
    }
}
