@extends('layouts.app')
@section('title','CREAR ESTUDIANTE')



@section('content')

    <div class="container-md mb-4 p-4">

        <h1 class="mb-4">  CREAR ESTUDIANTE </h1>


        @if($errors->any())
            <div class="alert alert-danger">
                <strong>UPS!</strong> Existe algunos problemas con tus datos
                <ul>
                    @foreach($errors->all() as $error)
                        <li> {{$error}} </li>
                    @endforeach
                </ul>
            </div>
        @endif




        <form action="{{route('estudiantes.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" required>
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="text" name="edad" id="edad" class="form-control" value="{{old('edad')}}" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{route('estudiantes.index')}}" class="btn btn-secondary"> Cancelar </a>


        </form>

    </div>















@endsection

















