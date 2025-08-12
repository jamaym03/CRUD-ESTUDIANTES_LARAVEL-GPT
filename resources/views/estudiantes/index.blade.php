@extends('layouts.app')

@section('title','index')

@section('content')




    <div class="container-md mb-2 py-4">


        <h1 class="mb-4">  ESTUDIANTE </h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif

        <a href="{{route('estudiantes.create')}}" class="btn btn-primary mb-3"> + Nuevo Estudiante  </a>

        <div class="table-responsive">

            <table class="table table-bordered">

                <thead>
                <tr>
                    <th>id</th>
                    <th>nombre</th>
                    <th>email</th>
                    <th>edad</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>

                @foreach($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->id  }}</td>
                        <td> {{ $estudiante->nombre  }} </td>
                        <td> {{ $estudiante->email  }} </td>
                        <td> {{ $estudiante->edad  }} </td>


                        <td>
                            <a href="{{route('estudiantes.edit',$estudiante->id)}}" class="btn btn-sm btn-warning">   <i class="bi bi-pencil-fill"></i></a>
                            <form method="POST" action="{{route('estudiantes.destroy',$estudiante->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-eliminar">  <i class="bi bi-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($estudiantes->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">  No hay registros disponibles </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>


    </div>

@endsection

@section('scripts')

    <script>

        @if(session('success'))

        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    @endif



document.addEventListener('DOMContentLoaded',function (){
    const botones = document.querySelectorAll('.btn-eliminar');
    botones.forEach(boton => {
       boton.addEventListener('click',function (){
            let form = this.closest('form');

           Swal.fire({
               title: '¿Estás seguro?',
               text: "¡No podrás revertir esto!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Sí, eliminar',
               cancelButtonText: 'Cancelar'
           }).then((result) => {
               if (result.isConfirmed) {
                   form.submit();
               }
           });
       }) ;
    });
});
    </script>

@endsection










