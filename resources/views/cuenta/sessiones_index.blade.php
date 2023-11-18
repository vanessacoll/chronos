@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Sessiones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('cuentas.index') }}">Cuenta</a></li>
              <li class="breadcrumb-item active">Sessiones</li>
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
                <h3 class="card-title">Sessiones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                   <tr>

                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                  
                </thead>
                <tbody>
                @foreach($sessiones as $session)
                     
                    <tr>
                    
                        
                        <td>{{$session->fecha_inicio}}</td>
                        <td>{{$session->fecha_fin}}</td>
                      
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