 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

     <a href="/home" class="brand-link" >
      <img src="/adminlte/dist/img/n.png" alt="Phonett Logo" class="brand-image" >
       <span class="brand-text font-weight-light">Chronos<b>Web</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
     
   

      <!-- SidebarSearch Form 

        PODEMOS USARLO DESPUES
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

           <!-- Sidebar user (optional) -->

      <div class="user-panel  mb-3 d-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <div class="nav-icon image">
               <img src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" class="img-circle elevation-2" alt="User Image">
             </div>
              <p class="ml-2">
                {{Auth::user()->nom_cuentas }} {{ Auth::user()->ape_cuentas }}
                <i class="right fas fa-angle-left mt-1"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('cuentas.index') }}" class="nav-link">
                  <i class="fas fa-user-alt nav-icon"></i>
                  <p>Mi Cuenta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route("settings.index",['user' => Auth::user()->id_cuenta])}}" class="nav-link">
                  <i class="nav-icon fas fa-tools nav-icon"></i>
                  <p>Configuracion</p>
                </a>
              </li>
              
            </ul>
          </li>

          </div>

          <li class="nav-header">MENU</li>
            <li class="nav-item" >
           <a href="{{ route('home') }}" class="nav-link  {{ request()->is('*home*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('routers.index') }}" class="nav-link {{ request()->is('*routers*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-hdd"></i>
              <p>
                Routers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('perfiles.index') }}" class="nav-link {{ request()->is('*perfiles*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Perfiles
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tickets.index') }}" class="nav-link {{ request()->is('*tickets*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Tickets
              </p>
            </a>
          </li>

          <li class="nav-header">LINKS</li>
            <li class="nav-item" >
           <a href="https://www.phonett.net/contactosoporte/" target="_blank" class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Ayuda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.phonett.net/log-in/" target="_blank"  class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Phonett en Linea
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.phonett.net/contacto/" target="_blank"class="nav-link">
              <i class="nav-icon far fa-circle"></i>
              <p>
                Contacto
              </p>
            </a>
          </li>

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>