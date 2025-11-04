  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Gestion</h6>
<ul class="navbar-nav">
  @if(auth()->user()->rol=="SuperAdmin")
    <li class="nav-item  active ">
      <a class="nav-link  active " href="/home">
        <i class="ni ni-tv-2 text-dager"></i> Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/users')}}">
        <i class="ni ni-ambulance text-blue"></i> usuarios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/especialidades')}}">
        <i class="ni ni-briefcase-24 text-orange"></i> Especialidades
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{url('/medicos')}}">
          <i class="fas fa-stethoscope text-info"></i> Médicos
        </a>
      </li>
    <li class="nav-item">
      <a class="nav-link " href="{{url('/pacientes')}}">
        <i class="fas fa-bed text-red"></i> Pacientes
      </a>
    </li>
    @elseif(auth()->user()->rol=="doctor")
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="ni ni-ambulance text-blue"></i> usuarios
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="/citas">
        <i class="ni ni-calendar-grid-58 text-primary"></i>Gestioar horario
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="">
        <i class="fas fa-clock text-info"></i> Mis citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="">
        <i class="fas fa-bed text-danger"></i> Mis pacientes
      </a>
    </li>
    @endif
    
    <!--<li class="nav-item">
      <a class="nav-link" href="./examples/login.html">
        <i class="ni ni-key-25 text-info"></i> 
      </a>
    </li>-->
    <li class="nav-item">
      <a class="nav-link nav-link-icon" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-in-alt"></i>cerrar sesion
      </a>
      <form action="{{route('logout')}}" method="POST" style="display:none;"id="logout-form">
        @csrf
    </form>
    </li>
  </ul>
 
  <hr class="my-3">
  @if(auth()->user()->rol=="SuperAdmin")
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="ni ni-books text-default"></i> Citas Medica
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="ni ni-chart-bar-32 text-Warning"></i> Desempeño Medico
      </a>
    </li>
  </ul>
  @endif
 
