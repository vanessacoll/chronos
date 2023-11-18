@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuracion</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('cuentas.index') }}">Mi Cuenta</a></li>
              <li class="breadcrumb-item active">Configuracion</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection

@section('contenido')

<div class="container-fluid">


<div class="card">
<div class="card-header">

<h3 class="card-title">
 <i class="fas fa-lock"></i>
 Cambio de Contraseña
</h3>

</div>
<div class="card-body">
Te recomendamos encarecidamente, que por tu seguridad, elijas una contraseña unica que no uses para conectarte a otras cuentas.

<div class="row mt-2 ml-0">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-change" >Cambiar Contraseña</button>
</div>

</div>

</div>



<div class="card">
<div class="card-header">
<h3 class="card-title">

<i class="fas fa-user-circle"></i>
Eliminar Cuenta

</h3>

</div>
<div class="card-body">
Tenga en cuenta que al eliminar su cuenta, toda la información registrada se eliminará sin posibilidad de restauración.
<div class="row mt-2 ml-0">


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-settings">Eliminar Cuenta</button>

</div>
</div>


</div>


<div class="modal fade" id="modal-settings">
<div class="modal-dialog ">
<div class="modal-content">


<div class="modal-body mt-3">
 
<div class="row">
  <div class="col-xl-2">

    <i class='fas fa-exclamation-triangle'style='font-size:48px'></i> 
    
  </div>

  <div class="col-xl-10">


  <h5> <b> Estás seguro de eliminar tu cuenta?. </b></h5>

  <p>Tenga en cuenta que al eliminar su cuenta, toda la información registrada se eliminará sin posibilidad de restauración. </p>
    
  </div>
  
</div>
  
</div>
<div class="text-rigth modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
  <form action="{{route("cuentas.destroy", ['user' => $user->id_cuenta])}}" method="get">
                              @method("delete")
                                @csrf

<button type="submit" class="btn btn-primary">Eliminar Cuenta</button>
</form>
</div>

</div>

</div>

</div>




    <form  id="form">
        @csrf
  <!-- Modal -->

  <div class="modal" tabindex="-1" role="dialog" id="modal-change">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="alert alert-danger" style="display:none"></div>
      

<div class="modal-header ">

  <h4 class="modal-title">
     <i class='fas fa-unlock'></i>
    Cambiar Contraseña
  </h4>
  
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>




      
      <div class="modal-body" style="overflow: hidden;">

          <h5>Estás a un paso de tu nueva contraseña, cambia tu contraseña ahora. </h5>

  <div class="input-group mb-3 mt-3">     
    <div class="input-group">
      <input ID="txtPassword" type="Password" Class="form-control" placeholder="introduce tu contraseña actual" name="txtPassword">
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword('txtPassword','.icon1')"> <span class="fa fa-eye-slash icon1"></span> </button>
          </div>
    </div>
    
        <div id="name-error"> </div> 
    
  </div>


   <div class="input-group mb-3">
     
        <div class="input-group">
      <input ID="txtPassword2" type="Password" Class="form-control" placeholder="Introduce tu nueva Contraseña" name="txtPassword2">
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword('txtPassword2','.icon2')"> <span class="fa fa-eye-slash icon2"></span> </button>
          </div>

    </div>

</div>

<div class="input-group mb-3">
     
        <div class="input-group">
      <input ID="txtPassword3" type="Password" Class="form-control" placeholder="Confirma tu nueva Contraseña" name="txtPassword3">
      <div class="input-group-append">
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword('txtPassword3','.icon3')"> <span class="fa fa-eye-slash icon3"></span> </button>
          </div>
    </div>
</div>





      </div>



  <div class="modal-footer justify-content-between">

<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button class="btn btn-primary" id="ajaxSubmit">Guardar Contraseña</button>

  </div>


    </div>
  </div>
</div>
  </form>


<!-- /.modal -->


</div>
 

<script>
         jQuery(document).ready(function(){

        

            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
                

               jQuery.ajax({


                  url: "{{ url('/changepassword') }}",
                  method: 'get',
                  data: {
                     password_actual: jQuery('#txtPassword').val(),
                     nueva_password: jQuery('#txtPassword2').val(),
                     confirmar_password: jQuery('#txtPassword3').val(),
                  },
                  success: function(result){

                    if(result.errors)
                    {

                      jQuery('.alert-danger').html('');

                      jQuery.each(result.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<li>'+value+'</li>');
                      });


                    }
                    else
                    {
                      jQuery('.alert-danger').hide();
                   
                      $('#modal-change').modal('hide');

                      $('#txtPassword').val('');
                      $('#txtPassword2').val('');
                      $('#txtPassword3').val('');

                    alerta();
                    }
                  }});
               });
            });
      </script>


<script type="text/javascript">
function alerta(){

    var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 7000
                    });
                  
                     Toast.fire({
                        icon: 'success',
                        title: 'Contraseña Cambiada Exitosamente'
                      })
 
  } 
</script>

      <!-- Latest compiled and minified JavaScript -->


@endsection
