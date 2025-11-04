
@extends('layouts.panel')

@section('content')


    
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar paciente</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/pacientes')}}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
        </div>
     <div class="card-body">

      @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            <strong>Por favor!</strong> {{$error}}
            <i class="fas fa-exclamation-triangle"></i>
          </div>
      
        @endforeach
      @endif
      <form action="{{url('/pacientes/'.$pacientes->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="codpaciente">codigo de paciente</label>
          <input type="text" name="codpaciente" class="form-control" value="{{old('codpaciente',$pacientes->codpaciente)}}" >
      </div>
        <div class="form-group">
            <label for="nombre">Nombre del paciente</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre',$pacientes->nombre)}}" >
        </div>
        <div class="form-group">
            <label for="apPaterno">Apellido Paterno del paciente</label>
            <input type="text" name="apPaterno" class="form-control" value="{{old('apPaterno',$pacientes->apPaterno)}}"   >
        </div>
        <div class="form-group">
          <label for="apMaterno">Apellido Materno del paciente</label>
          <input type="text" name="apMaterno" class="form-control" value="{{old('apMaterno',$pacientes->apMaterno)}}"   >
      </div>
        <div class="form-group">
            <label for="celula">CI</label>
            <input type="text" name="celula" class="form-control" value="{{old('celula',$pacientes->celula)}}" >
        </div>
        <div class="form-group">
            <label for="telefono">celular</label>
            <input type="text" name="telefono" class="form-control" value="{{old('telefono',$pacientes->telefono)}}" >
        </div>
        <div class="form-group">
            <label for="fechanaci">fecha de nacimiento</label>
            <input type="date" name="fechanaci" class="form-control" value="{{old('fechanaci',$pacientes->fechanaci)}}" >
        </div>
        <div class="form-group">
            <label for="edad">edad del paciente</label>
            <input type="number" name="edad" class="form-control" value="{{old('edad',$pacientes->edad)}}" >
        </div>
        <div class="form-group">
          <label for="direccion">direccion</label>
          <input type="text" name="direccion" class="form-control" value="{{old('direccion',$pacientes->direccion)}}" >
      </div>
        <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
    </form>
     </div>
      </div>

 

@endsection
