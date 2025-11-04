@extends('layouts.panel')

@section('content')


    
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-xl-12" >
              <form action="{{url('/users')}}" method="GET">
                <div class="form-row">
                  <div class="col-sm-4 my-1 ">
                    <input type="text" class="form-control" name="buscar" placeholder="Buscardor">
                  </div>
                  <div class="col-auto my-1">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                    <input type="submit" class="btn btn-danger" value="Borrar busqueda">
                  </div>
                </div>
              </form>
            </div>
            <div class="col">
              <h3 class="mb--3">Usuarios</h3>
            </div>
            <div class="col text-right mb--3" >
              @if(auth()->user()->rol=="SuperAdmin")
              <a href="{{url('/users/create')}}" class="btn btn-sm btn-primary">Nuevos usuarios</a>
              @endif
              <button type="button" class="btn btn-sm btn-success " data-toggle="modal" data-target="#modal-notification">Generar pdf</button>
                <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
              <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                  <div class="modal-content bg-gradient-success">
        	
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification" aria-hidden="true">ALERTA</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Desea genrar pdf!</h4>
                    <p>Esta de acuerdo con generar un pdf con los datos de la tabla usuario</p>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white"><a href="{{url('/users/pdf')}}">Generar pdf</a></button>
                <button  type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Cancelar</button>
            </div>
            
                </div>
            </div>
              
            </div>
          </div>
        </div>
        <div class="card-body">
          @if(session('notification'))
            <div class="alert alert-success" role="alert">
                {{ session('notification') }}
            </div>
        
          @endif
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">dia de ingreso</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              
              <tr>
                <th scope="row">
                  {{$user->name}}
                </th>
                <td>
                    {{$user->email}}
                </td>
                <td>
                  {{$user->created_at->diffForHumans()}}
              </td>
                <td>
                    <form action="{{url('/users/'.$user->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{url('/users/'.$user->id.'/edit')}}" class="btn btn-sm btn-primary" >Editar</a>
                      <button type="submit" class="btn btn-sm btn-danger" >Eliminar</button>
                    </form>
                  
                    
                </td>
                
              </tr>
              
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-body">
          {{ $users->appends(['buscar'=>$buscar] )}}
        </div> 
      </div>

@endsection

