@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Perfiles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Perfiles</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection


@section('contenido')

<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
  <!-- Default box -->
 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Perfiles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                   <tr>

                    <th>Perfil</th>
                    <th>Tiempo</th>
                    <th>Tipo</th>
                    <th>Usuarios</th>
                    <th>Total Tickets</th>
                    <th>Router</th>
                    <th>Estatus</th>
                    <th>Fecha Creacion</th>
                  
                </thead>
                <tbody>
                @foreach($perfiles as $perfil)
                     
                    <tr>
                    
                        <td>{{$perfil->nombre}}</td>
                        <td>{{$perfil->tiempo}}</td>
                        <td>{{$perfil->tipo_perfiles->des_tipo_perfil}}</td>
                        <td>{{$perfil->users}}</td>
                        <td>{{$perfil->tickets->count()}}</td>
                        <td>{{$perfil->routers->nom_routers}}</td>
                        <td>{{$perfil->status->des_status}}</td>
                        <td>{{$perfil->fecha}}</td>
                    
                      
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
</div>

      @endsection