
@extends('layouts.panel')

@section('content')


    
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nuevo medico</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/medicos')}}" class="btn btn-sm btn-success">
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
      <form action="{{url('/medicos')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="coddoctor">codigo doctor</label>
          <input type="text" name="coddoctor" class="form-control" value="{{old('coddoctor')}}" required>
      </div>
        <div class="form-group">
            <label for="nombre">Nombre del medico</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" required>
        </div>
        <div class="form-group">
            <label for="apPaterno">Apellido Paterno del medico</label>
            <input type="text" name="apPaterno" class="form-control" value="{{old('apPaterno')}}" required >
        </div>
        <div class="form-group">
          <label for="apMaterno">Apellido Materno del medico</label>
          <input type="text" name="apMaterno" class="form-control" value="{{old('apMaterno')}}" required >
      </div>
        <div class="form-group">
            <label for="celula">CI</label>
            <input type="text" name="celula" class="form-control" value="{{old('celula')}}" required >
        </div>
        <div class="form-group">
            <label for="telefono">celular</label>
            <input type="text" name="telefono" class="form-control" value="{{old('telefono')}}"required >
        </div>
        <div class="form-group">
          <label for="dirreccion"> direccion</label>
          <input type="text" name="dirreccion" class="form-control" value="{{old('dirreccion')}}" required>
      </div>
        <button type="submit" class="btn btn-sm btn-primary">Crear medico</button>
    </form>
     </div>
      </div>

 

@endsection
