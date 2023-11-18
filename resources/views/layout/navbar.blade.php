<nav class="main-header navbar navbar-expand navbar-dark" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

<li class="nav-item dropdown mr-3">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>

@if (count(auth()->user()->unreadNotifications))
<span class="badge badge-light navbar-badge">{{count(auth()->user()->unreadNotifications)}}

  
@endif
</span>

</a>
<div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">


<a href="{{ route('post.index') }}" class="dropdown-item dropdown-footer">Ver todas las Notificaciones</a> 

 <div class="dropdown-divider"></div>

<span class="dropdown-item dropdown-header">Notificaciones sin Leer</span>


@forelse(auth()->user()->unreadNotifications as $notification)
<a href="{{ route('post.index') }}" class="dropdown-item">
<i class="fas fa-users mr-2"></i> {{ $notification->data['title'] }}
<span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
</a>
@empty
<span class="ml-3 pull-right text-muted text-sm">Sin notificaciones sin leer</span>
@endforelse

<div class="dropdown-divider"></div>
<span class="dropdown-item dropdown-header">Notificaciones Leidas</span>


@forelse(auth()->user()->readNotifications as $notification)
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> {{ $notification->data['title'] }}
<span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
</a>
@empty
<span class="ml-3 pull-right text-muted text-sm">Sin notificaciones leidas</span>
@endforelse



<div class="dropdown-divider"></div>
<a href="{{ route('markAsRead') }}" class="dropdown-item dropdown-footer">Marcar todo como leido</a>
</div>
</li>

       <li class=" nav-item dropdown user user-menu mt-1">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->email }}</span>
            </a>

            
        
            <ul class="dropdown-menu widget-user">
              <!-- User image -->
             

             <div class="widget-user-header text-white user_header" style="background: url('/adminlte/dist/img/aside13.png') center center;">
      
          <h3 class="widget-user-username text-right">{{ Auth::user()->nom_cuentas }} {{ Auth::user()->ape_cuentas }}</h3>
          <h5 class="widget-user-desc text-right">Usuario</h5>
            </div>

          <div class="widget-user-image">
              <img class="img-circle" src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" alt="User Avatar">
          </div>


    <div class="card-footer">
          
            <a href="{{ route('cuentas.index') }}" class="dropdown-item" >
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Mi Cuenta
              </p>
            </a>

            <div class="dropdown-divider"></div>
          
            <a href="{{route("settings.index",['user' => Auth::user()->id_cuenta])}}" class="dropdown-item">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Configuracion
              </p>
            </a>

            <div class="dropdown-divider"></div>
    
            <a aria-labelledby="navbarDropdown"
                 href="{{ route('logout') }}"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Cerrar Session
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
           </form>
          



</div>



            </ul>

          </li>
    </ul>
  </nav>