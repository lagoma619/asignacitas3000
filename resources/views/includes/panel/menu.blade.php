

<!-- Navigation -->
<h6 class="navbar-heading text-muted">GESTIONAR DATOS</h6>
<ul class="navbar-nav">
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
