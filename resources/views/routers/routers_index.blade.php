@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Routers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Routers</li>
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
                <h3 class="card-title">Routers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                   <tr>

                    <th>Router</th>
                    <th>Ip</th>
                    <th>Puerto</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                    <th>Estatus</th>
          
                  
                </thead>
                <tbody>
                @foreach($routers as $router)
                     
                    <tr>
                    
                        <td>{{$router->nom_routers}}</td>
                        <td>{{$router->ip_private}}</td>
                        <td>{{$router->puerto}}</td>
                        <td>{{$router->nom_conex}}</td>
                        <td>{{$router->password}}</td>
                        <td>{{$router->status->des_status}}</td>
                      
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