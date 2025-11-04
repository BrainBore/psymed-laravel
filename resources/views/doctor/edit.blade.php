
@extends('layouts.panel')

@section('content')


    
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar medico</h3>
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
      <form action="{{url('/medicos/'.$doctors->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="coddoctor">coddoctor</label>
          <input type="text" name="coddoctor" class="form-control" value="{{old('coddoctor',$doctors->coddoctor)}}" >
      </div>
        <div class="form-group">
            <label for="nombre">Nombre del medico</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre',$doctors->nombre)}}" >
        </div>
        <div class="form-group">
            <label for="apPaterno">Apellido Paterno del medico</label>
            <input type="text" name="apPaterno" class="form-control" value="{{old('apPaterno',$doctors->apPaterno)}}"   >
        </div>
        <div class="form-group">
          <label for="apMaterno">Apellido Materno del medico</label>
          <input type="text" name="apMaterno" class="form-control" value="{{old('apMaterno',$doctors->apMaterno)}}"   >
      </div>
        <div class="form-group">
            <label for="celula">Celula</label>
            <input type="text" name="celula" class="form-control" value="{{old('celula',$doctors->celula)}}" >
        </div>
        <div class="form-group">
            <label for="telefono">celular</label>
            <input type="text" name="telefono" class="form-control" value="{{old('telefono',$doctors->telefono)}}" >
        </div>
        <div class="form-group">
          <label for="dirreccion">direccion</label>
          <input type="text" name="dirreccion" class="form-control" value="{{old('dirreccion',$doctors->dirreccion)}}" >
      </div>
        <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
    </form>
     </div>
      </div>

 

@endsection
