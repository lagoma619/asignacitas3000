

<!-- Navigation -->
<h6 class="navbar-heading text-muted">
    @if(auth()->user()->role=='admin')
    GESTIONAR DATOS
    @else
    MENÚ
    @endif
</h6>
<ul class="navbar-nav">
    @if(auth()->user()->role=='admin')
        <li class="nav-item">
            <a class="nav-link" href="./index.html">
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/specialties')}}">
                <i class="ni ni-paper-diploma text-blue"></i> Especialidades
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/doctors')}}">
                <i class="ni ni-badge text-orange"></i> Medicos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/patients')}}">
                <i class="ni ni-satisfied text-info"></i> Pacientes
            </a>
        </li>
    @elseif (auth()->user()->role=='doctor')
        <li class="nav-item">
            <a class="nav-link" href="{{url('/schedule')}}">
                <i class="ni ni-tv-2 text-primary"></i> Gestionar horario
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/specialties')}}">
                <i class="ni ni-paper-diploma text-blue"></i> Mis citas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/doctors')}}">
                <i class="ni ni-badge text-orange"></i> Mis pacientes
            </a>
        </li>
    @else {{--Patient--}}
    <li class="nav-item">
        <a class="nav-link" href="{{url('/specialties')}}">
            <i class="ni ni-laptop text-blue"></i> Reservar cita
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('/doctors')}}">
            <i class="ni ni-badge text-orange"></i> Mis citas
        </a>
    </li>
    @endif
        <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-key-25 "></i> Cerrar sesión
    </a>
    <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
        @csrf
    </form>
</li>
</ul>
<!-- Divider -->
@if(auth()->user()->role=='admin')
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">REPORTES</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
<li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
        <i class="ni ni-sound-wave text-red"></i>Frecuencia de citas
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-collection text-green"></i> Médicos más activos
    </a>
</li>

</ul>
@endif
