@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Tickets Creados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Tickets</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

 
@section('contenido')



<div class="container-fluid">
    <div class="row">
  <!-- Default box -->
 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tickets</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                   <tr>

                    <th>Router</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>Perfil</th>
                    <th>Precio</th>
                    <th>Estatus</th>
                    <th>Tiempo de Vida</th>
                    <th>Tiempo Consumido</th>
                  
                   </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                     
                    <tr>
                    
                        <td>{{$ticket->routers->nom_routers}}</td>
                        <td>{{$ticket->fecha_creacion}}</td>
                        <td>{{$ticket->usuario}}</td>
                        <td>{{$ticket->clave}}</td>
                        <td>{{$ticket->perfiles->nombre}}</td>
                        <td>{{$ticket->precio}}</td>
                        <td>{{$ticket->status->des_status}}</td>
                        <td>{{$ticket->limit_uptime}}</td>
                        <td>{{$ticket->uptime}}</td>
                      
                    </tr>
                      
                @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->
</div>
</div>
   @endsection


   