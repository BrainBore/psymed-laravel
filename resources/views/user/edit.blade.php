<?php
use  Illuminate\Support\Str;
?>
@extends('layouts.panel')

@section('content')


    
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar usuario</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/users')}}" class="btn btn-sm btn-success">
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
      <form action="{{url('/users/'.$usuario->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del usuario</label>
            <input type="text" name="name" class="form-control" value="{{old('name',$usuario->name)}}" >
        </div>
        <div class="form-group">
            <label for="email">Correo electronico</label>
            <input type="text" name="email" class="form-control" value="{{old('email',$usuario->email)}}"   >
        </div>
        
        <div class="form-group">
          <label for="password">contraseña</label>
          <input type="text" name="password" class="form-control"  >
          <small class="text-warning">Solo llena el campo si deseas cambiar la contraseña</small>
      </div>
        <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
    </form>
     </div>
      </div>

 

@endsection
