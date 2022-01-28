@extends('layouts.panel')

@section('content')
    <div class="row mt-5">
    <div class="col-xl-8 mb-5 mb-xl-0">
    <div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Especialidades</h3>
            </div>
            <div class="col text-right">
                <a href="{{url('/specialties/create')}}" class="btn btn-sm btn-success">Nueva especialidad</a>
            </div>
        </div>
    </div>
        @if(session('notification'))
        <div class="card-body">
        <div class="alert alert-success" role="alert">
            <strong>{{session('notification')}}</strong>
        </div>
        </div>
        @endif
    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($specialties as $specialty)
            <tr>
                <th scope="row">
                    {{$specialty->name}}
                </th>
                <td word-wrap:break-word>
                    <p class="card-text">{{$specialty->description}}</p>
                </td>

                <td>

                    <form action="{{url('/specialties/'.$specialty->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{url('/specialties/'.$specialty->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                        <button href="" class="btn btn-sm btn-outline-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
    <div class="col-xl-4">
    </div>

@endsection
