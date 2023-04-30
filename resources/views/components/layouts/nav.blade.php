<nav class="navbar navbar-expand-md navbar-dark background-nav">
  <div class="container-fluid">
  <!-- icono o nombre -->

    <a class="navbar-brand" href="{{route('home')}}">
      <img src="{{asset('img/logo.png')}}" alt="logo-cediab" width="200px" height="100px" class="ms-5">
    </a>

  <!-- boton del menu -->

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- elementos del menu colapsable -->

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto pe-5">
          <li class="nav-item">
            <a class="nav-link active"  aria-current="page" href="{{route('home')}}"><p class="fs-4 fst-italic">Inicio</p></a>
          </li>
          @auth
          @if ((Auth::user()->role == 'god' || Auth::user()->role == 'admin'))
          <li class="nav-item">
            <a class="nav-link active" href="{{route('paciente')}}"><p class="fs-4 fst-italic">Pacientes</p></a>
          </li>
          @endif
          @if ((Auth::user()->role == 'god'))
            <li class="nav-item">
              <a class="nav-link active" href="{{route('roles')}}"><p class="fs-4 fst-italic">Roles</p></a>
            </li>
          @endif
          @endauth
          <li class="nav-item">
            <a class="nav-link active" href="{{route('about')}}"><p class="fs-4 fst-italic">Contacto</p></a>
          </li>
          @guest
            <li class="nav-item">
              <a class="nav-link active" href="{{route('login')}}"><p class="fs-4 fst-italic"><button class="btn btn-success">Login</button></p></a>
            </li>
          @endguest
          @auth
          <li class="nav-item">
            <form action="{{route('logout')}}" method="post">
              @csrf
              <a class="nav-link active" href="{{route('logout')}}"><p class="fs-4 fst-italic"><button class="btn btn-danger" onclick="this.closest('form').submit()">Loggout</button></p></a>
            </form>
          </li>
          @endauth
        </ul>
      </div>
  </div>

</nav>
<div class="container">
@if(session('session'))
          <p class="text-center h5 mt-2 fw-lighter medium text-primary">{{session('session')}}</p>
@endif
</div>