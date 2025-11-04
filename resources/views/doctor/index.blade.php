@extends('layouts.panel')

@section('content')


    
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col-xl-12">
              <form action="{{url('/medicos')}}" method="GET">
                <div class="form-row">
                  <div class="col-sm-4 my-1">
                    <input type="text" class="form-control" name="buscar">
                  </div>
                  <div class="col-auto my-1">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                  </div>
                </div>
              </form>
            </div>
            <div class="col">

              <h3 class="mb-0">Medicos</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/medicos/create')}}" class="btn btn-sm btn-primary">Nueva medico</a>
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
                    <p>Esta de acuerdo con generar un pdf con los datos de la tabla doctor</p>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-white"><a href="{{url('/medicos/pdf')}}">Generar pdf</a></button>
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
          @if(session('notifications'))
            <div class="alert alert-danger" role="alert">
                {{ session('notifications') }}
            </div>
        
          @endif
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Codigo doctor</th>
                <th scope="col">Nombre</th>
                <th scope="col">apellido paterno</th>
                <th scope="col">CI</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($doctores as $doctor)
              
              <tr>
                <th scope="row">
                  {{$doctor->coddoctor}}
                </th>
                <td>
                  {{$doctor->nombre}}
                </td>
                <td>
                  {{$doctor->apPaterno}}
                </td>
                <td>
                  {{$doctor->celula}}
                </td>
                
                <td>
                    
                    <form action="{{url('/medicos/'.$doctor->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <a href="{{url('/medicos/'.$doctor->id.'/edit')}}" class="btn btn-sm btn-primary" >Editar</a>
                      <button type="submit" class="btn btn-sm btn-danger" >Eliminar</button>
                    </form>
                    
                </td>
                
              </tr>
              
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-body">
          {{ $doctores->appends(['buscar'=>$buscar] )}}
        </div> 
      </div>

 

@endsection
