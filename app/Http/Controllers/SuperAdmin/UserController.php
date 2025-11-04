<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
    
    
    public function index(Request $request)
    {
    
        $buscar= $request->buscar;
        $users=User::where('name','LIKE','%'.$buscar.'%')
        ->orWhere('email','LIKE','%'.$buscar.'%')
        ->latest('id')
        ->paginate(4);
        $data=[
            'users'=>$users,
            'buscar'=>$buscar,

        ];
        return view('user.index',$data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $roles=[
            'name'=>'required|min:1',
            'email'=>'required|email',
             'rol'=>'required',
        ];
        $messages=[
            'name.required'=>'El nombre del usuario es obligatorio',
            'name.min'=>'El nombre del usuario debe tener mas de 1 letras',
            'email.required'=>'El correo electronico es obligatorio',
            'email.email'=>'Ingrese una direccion de correo electronico valido',
            'rol.required'=>'El rol es obligatorio',
            
        ];
        $this->validate($request,$roles,$messages);
        User::create(
            $request->only('name','email','rol')
            +[
                'password'=>bcrypt($request->input('password'))
            ]
        );
        $notification='El usuario se ha registrado correctamente';
        return redirect('/users')->with(compact('notification'));
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $usuario=User::findOrFail($id);
        return view('user.edit',compact('usuario'));
    }

   
    public function update(Request $request, $id)
    {
        $roles=[
            'name'=>'required|min:1',
            'email'=>'required|email',
           
        ];
        $messages=[
            'name.required'=>'El nombre del usuario es obligatorio',
            'name.min'=>'El nombre del usuario debe tener mas de 1 letras',
            'email.required'=>'El correo electronico es obligatorio',
            'email.email'=>'Ingrese una direccion de correo electronico valido',
        ];
        $this->validate($request,$roles,$messages);
        $usuario=User::findOrFail($id);

        $data= $request->only('name','email');

        $password=$request->input('password');
         if($password)
            $data['password']=bcrypt($password);
        $usuario->fill($data);
        $usuario->save();
        $notification='La informacion del usuario se actualizo correctamente';
        return redirect('/users')->with(compact('notification'));
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $doctorUser=$user->name;
        $user->delete();
        $notification="El usuario $doctorUser ha sido eliminado";
        return redirect('/users')->with(compact('notification'));
    }
    public function pdf()
    {
       $user=User::paginate();
       $pdf = Pdf::loadView('user.pdf', ['user' => $user]);
       return $pdf->stream();
    }
    
   

}

