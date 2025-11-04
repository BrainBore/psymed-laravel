
@extends('layouts.panel')

@section('content')


    
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo paciente</h3>
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
      <form action="{{url('/pacientes')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="codpaciente">codigo paciente</label>
          <input type="text" name="codpaciente" class="form-control" value="{{old('codpaciente')}}" required>
      </div>
        <div class="form-group">
            <label for="nombre">Nombre del paciente</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required>
        </div>
        <div class="form-group">
            <label for="apPaterno">Apellido Paterno del paciente</label>
            <input type="text" name="apPaterno" class="form-control" value="{{old('apPaterno')}}" required >
        </div>
        <div class="form-group">
          <label for="apMaterno">Apellido Materno del paciente</label>
          <input type="text" name="apMaterno" class="form-control" value="{{old('apMaterno')}}" required >
      </div>
        <div class="form-group">
            <label for="celula">CI</label>
            <input type="text" name="celula" class="form-control" value="{{old('celula')}}" required >
        </div>
        <div class="form-group">
            <label for="telefono">celular</label>
            <input type="text" name="telefono" class="form-control" value="{{old('telefono')}}" required >
        </div>
        <div class="form-group">
          <label for="fechanaci">fecha de nacimiento</label>
          <input type="date" name="fechanaci" class="form-control" value="{{old('fechanaci')}}" required>
      </div>
      <div class="form-group">
        <label for="edad">edad</label>
        <input type="number" name="edad" class="form-control" value="{{old('edad')}}" required>
    </div>
        <div class="form-group">
          <label for="direccion"> direccion</label>
          <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" required >
      </div>
        <button type="submit" class="btn btn-sm btn-primary">Crear medico</button>
    </form>
     </div>
      </div>

 

@endsection
