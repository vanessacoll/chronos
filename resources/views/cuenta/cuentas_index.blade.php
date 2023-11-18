@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mi Cuenta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Mi Cuenta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

 <div class="container-fluid">


        <div class="row d-flex">
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">

                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> 

                              

                                  <img src="{{ asset('storage/image_profile/'.$user->image_path) }}" alt="" class="img-thumbnail-profile rounded-circle mt-2">


                                </div>
         
         <h4 class="f-w-200">{{$user->nom_cuentas }} {{ $user->ape_cuentas }}
         </h4>

        <a  href="{{ route('sessiones.index') }}">
          <h5 class="font-size-15 f-w-200"> 
          @if(isset($session->fecha_fin))
          
          <i class="fa fa-circle text-danger"></i> Offline
          @else
          <i class="fa fa-circle text-success"></i> Online
          @endif
          </h5>

          </a>
                        
    <!-- Sidebar -->
<div class="sidebar text-left mt-3">

 <ul class="nav nav-pills flex-column">
<li class="nav-item">
<a href="#" class="nav-link" data-toggle="modal" data-target="#modal-image" class="nav-link">
Cambiar Imagen <i class="nav-icon fas fa-image float-right mt-1"></i> 
</a>
</li>
<li class="nav-item">
<a href="{{route("settings.index",['user' => $user->id_cuenta])}}" class="nav-link">
 Configuracion <i class="nav-icon fas fa-tools float-right mt-1"></i> 
</a>
</li>
<li class="nav-item">
<a href="{{ route('sessiones.index') }}" class="nav-link">
Listado de Sessiones <i class="nav-icon fas fa-clock float-right mt-1"></i> 
</a>
</li>
</ul>


<a href="{{ route('logout') }}"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-block btn-outline-light mt-3"><b>Cerrar Session</b></a>


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->


       </div>
</div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h5 class="m-b-20 p-b-5 b-b-default f-w-400">Informacion General</h5>
                                <div class="m-b-20 row">
                                    <div class="col-sm-6">
                                        <b><p class="m-b-10 f-w-400">Nombres</p></b>
                                        <h6 class="text-muted f-w-400">{{$user->nom_cuentas }} {{ $user->ape_cuentas }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                       <b> <p class="m-b-10 f-w-400">Email</p></b>
                                        <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                                    </div>
                                </div>

                                <h5 class="m-b-20 p-b-5 b-b-default f-w-400">Sessiones</h5>
                                <div class=" m-b-20 row">
                                    <div class="col-sm-6">
                                        <b><p class="m-b-10 f-w-400">Ultimo Inicio de Session</p></b>
                                        <h6 class="text-muted f-w-400">{{ $session->fecha_inicio }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                       <b> <p class="m-b-10 f-w-400">Ultima Sincronizacion</p></b>
                                        <h6 class="text-muted f-w-400">{{$fecha}}</h6>
                                    </div>
                                </div>


                                <h5 class="m-b-20 p-b-5 b-b-default f-w-400">Licencia {{ $licencia->tip_licencias->nombre }}</h5>

                                <div class=" m-b-20 row">
                                    <div class="col-sm-6">
                                        <b><p class="m-b-10 f-w-400">Licencia</p></b>
                                        <h6 class="text-muted f-w-400">{{ $licencia->license_key }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                       <b> <p class="m-b-10 f-w-400">Estatus</p></b>
                                        <h6 class="text-muted f-w-400">{{ $licencia->statuses->des_status}}</h6>
                                    </div>
                                </div>

                                <div class="m-b-0 row">
                                    <div class="col-sm-6">
                                        <b><p class="m-b-10 f-w-400">Fecha de Inicio</p></b>
                                        <h6 class="text-muted f-w-400">{{ $licencia->fecha_inicio }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                       <b> <p class="m-b-10 f-w-400">Fecha de Vencimiento</p></b>
                                        <h6 class="text-muted f-w-400">{{ $licencia->fecha_vencimiento }}</h6>
                                    </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div class="modal fade" id="modal-image">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Agregar Imagen</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>

{!! Form::open(['route' => ['cuentas.imagen.index', $user->id_cuenta ], 'method' => 'patch', 'files' => true]) !!}
<div class="modal-body">


{!! Form::file('image') !!}

</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary">Guardar Imagen</button>
</div>
{!! Form::close() !!}
</div>

</div>

</div>
         
 </div>
 

      @endsection