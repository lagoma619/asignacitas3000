@extends('layouts.panel')

@section('content')

    <form action="{{url('/schedule')}}" method="post">
        @csrf
    <div class="row mt-5">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Gestionar horario</h3>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-sm btn-success">Guardar cambios</button>
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
                            <th scope="col">Día</th>
                            <th scope="col">Activo</th>
                            <th scope="col">Turno mañana</th>
                            <th scope="col">Turno tarde</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workDays as $key => $workDay)
                            <tr>
                                <th>{{ $days[$key] }}</th>
                                <th><label class="custom-toggle">
                                        <input type="checkbox" name="active[]" @if($workDay->active) checked @endif value="{{ $key }}">

                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label> </th>
                                <th>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" name="morning_start[]">
                                            @for ($h=6; $h<=12; $h++ )
                                                <option value="{{ $h }}:00"
                                                        @if($h.':00:00' == $workDay->morning_start) selected  @endif >
                                                    {{ $h }}:00</option>
                                                <option value="{{ $h }}:30"
                                                        @if($h.':30:00' == $workDay->morning_start) selected  @endif >
                                                    {{ $h }}:30</option>
                                            @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="morning_end[]">
                                                @for ($h=6; $h<=12; $h++ )
                                                    <option value="{{ $h }}:00"
                                                            @if($h.':00:00' == $workDay->morning_end) selected  @endif>
                                                        {{ $h }}:00</option>
                                                    <option value="{{ $h }}:30"
                                                            @if($h.':30:00' == $workDay->morning_end) selected  @endif >
                                                        {{ $h }}:30</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" name="afternoon_start[]">
                                                @for ($h=13; $h<=18; $h++ )
                                                    <option value="{{ $h }}:00"
                                                            @if($h.':00:00' == $workDay->afternoon_start) selected  @endif >
                                                        {{ $h }}:00</option>
                                                    <option value="{{ $h }}:30"
                                                            @if($h.':30:00' == $workDay->afternoon_start) selected  @endif >
                                                        {{ $h }}:30</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="afternoon_end[]">
                                                @for ($h=13; $h<=18; $h++ )
                                                    <option value="{{ $h }}:00"
                                                            @if($h.':00:00' == $workDay->afternoon_end) selected  @endif >
                                                        {{ $h }}:00</option>
                                                    <option value="{{ $h }}:00"
                                                            @if($h.':30:00' == $workDay->afternoon_end) selected  @endif >
                                                        {{ $h }}:30</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
        </div>
    </div>
    </form>
@endsection
