@extends('layouts.panel')

@section('content')

    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Médicos</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{url('/doctors/create')}}" class="btn btn-sm btn-success">Nuevo médico</a>
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
                            <th scope="col">E-mail</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($doctors as $doctor)
                            <tr>
                                <th scope="row">
                                    {{$doctor->name}}
                                </th>
                                <td break-word>
                                    <p class="card-text">{{$doctor->email}}</p>
                                </td>

                                <td break-word>
                                    <p class="card-text">{{$doctor->dni}}</p>
                                </td>

                                <td>

                                    <form action="{{url('/doctors/'.$doctor->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{url('/doctors/'.$doctor->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
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
