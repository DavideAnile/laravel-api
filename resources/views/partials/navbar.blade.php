<nav class="navbar navbar-light bg-light">
  <div class="container-fluid px-5">
    <div class="d-flex justify-content-center align-items-center gap-5">
      <h1>Ciao   <small>{{ Auth::user()->name }}</small> ! </h1>
      <div><a href="{{route('admin.')}}" class="text-decoration-none text-black">Dashboard</a></div>
    </div>

    
      <div>

        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
  
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-block">
            @csrf
        </form>
      </div>
    
  </div>
</nav>