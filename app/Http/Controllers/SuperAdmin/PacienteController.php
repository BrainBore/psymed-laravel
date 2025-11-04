<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Models\paciente;
use Laravel\Ui\Presets\React;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;
class PacienteController extends Controller
{
    
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        $pacientes=paciente::where('nombre','LIKE','%'.$buscar.'%')
        ->orWhere('codpaciente','LIKE','%'.$buscar.'%')
        ->latest('id')
        ->paginate(4);
        $data=[
            'pacientes'=>$pacientes,
            'buscar'=>$buscar,

        ];
        return view('paciente.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    public function store(Request $request)
    {
        $roles=[
            'codpaciente'=>'required',
            'nombre'=>'required|min:1',
            'apPaterno'=>'required|min:1',
            'apMaterno'=>'required|min:1',
            'celula'=>'nullable|min:6',
            'telefono'=>'required',
            'fechanaci'=>'required',
            'edad'=>'required',
            'direccion'=>'required',
        ];
        $messages=[
            'codpaciente.required'=>'El codigo del paciente es obligatorio',
            'nombre.required'=>'El nombre del paciente es obligatorio',
            'nombre.min'=>'El nombre del paciente debe tener mas de 1 letras',
            'apPaterno.required'=>'El apellido paterno del paciente es obligatorio',
            'apPaterno.min'=>'El apellido paterno del paciente debe tener mas de 1 letras',
            'apMaterno.required'=>'El apellido materno del paciente es obligatorio',
            'apMaterno.min'=>'El apellido materno del paciente debe tener mas de 1 letras',
            'celula.required'=>'El carnet de identidad del paciente es obligatorio',
            'celula.min'=>'La carnet de identidad del paciente debe tener mas de 6 digitos',
            'telefono.required'=>'El numero de telefono es obligatorio',
            'fechanaci.required'=>'La fecha de nacimiento del paciente es obligtoria',
            'edad.required'=>'La edad del paciente es importante',
            'direccion.required'=>'La dirrecion del paciente es obligatorio es obligatorio',
            
        ];
        $this->validate($request,$roles,$messages);
        paciente::create(
            $request->only('codpaciente','nombre','apPaterno','apMaterno','celula','telefono','fechanaci','edad','direccion')
          
        );
        $notification='El paciente se ha registrado correctamente';
        return redirect('/pacientes')->with(compact('notification'));
    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pacientes=paciente::findOrFail($id);
        return view('paciente.edit',compact('pacientes'));
    }

    public function update(Request $request, $id)
    {
        $roles=[
            'codpaciente'=>'required',
            'nombre'=>'required|min:1',
            'apPaterno'=>'required|min:1',
            'apMaterno'=>'required|min:1',
            'celula'=>'nullable|min:6',
            'telefono'=>'required',
            'fechanaci'=>'required',
            'edad'=>'required',
            'direccion'=>'required',
        ];
        $messages=[
            'codpaciente.required'=>'El codigo del paciente es obligatorio',
            'nombre.required'=>'El nombre del paciente es obligatorio',
            'nombre.min'=>'El nombre del paciente debe tener mas de 1 letras',
            'apPaterno.required'=>'El apellido paterno del paciente es obligatorio',
            'apPaterno.min'=>'El apellido paterno del paciente debe tener mas de 1 letras',
            'apMaterno.required'=>'El apellido materno del paciente es obligatorio',
            'apMaterno.min'=>'El apellido materno del paciente debe tener mas de 1 letras',
            'celula.required'=>'El carnet de identidad del paciente es obligatorio',
            'celula.min'=>'La carnet de identidad del paciente debe tener mas de 6 digitos',
            'telefono.required'=>'El numero de telefono es obligatorio',
            'fechanaci.required'=>'La fecha de nacimiento del paciente es obligtoria',
            'edad.required'=>'La edad del paciente es importante',
            'direccion.required'=>'La dirrecion del paciente es obligatorio es obligatorio',
            
        ];
        $this->validate($request,$roles,$messages);
        $pacientes=paciente::findOrFail($id);

        $data= $request->only('codpaceinte','nombre','apPaterno','apMaterno','celula','telefono','fechanaci','edad','direccion');

        $pacientes->fill($data);
        $pacientes->save();
        $notification='La informacion del paciente se actualizo correctamente';
        return redirect('/pacientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacientes=paciente::findOrFail($id);
        $pacienteName=$pacientes->nombre;
        $pacientes->delete();
        $notifications="El paciente $pacienteName ha sido eliminado";
        return redirect('/pacientes')->with(compact('notifications'));
    }
    public function pdf()
    {
       $paciente=paciente::paginate();
       $pdf = Pdf::loadView('paciente.pdf', ['paciente' => $paciente]);
       return $pdf->stream();
    }
}
