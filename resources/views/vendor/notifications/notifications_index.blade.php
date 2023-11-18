@extends('layout.plantilla')

 @section('content-header')
 
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notificaciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Notificaciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
   
 @endsection


@section('contenido')


  <!-- Default box -->
 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Notificaciones</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
              @if (auth()->user())
              @forelse ($postNotifications as $notification)

              <div class="alert alert-default-dark">

               <h5>{{ $notification->data['title'] }}</h5> 
               <div class="row justify-content-between ml-0">
                 {{ $notification->data['description'] }}
                <p> {{ $notification->created_at->diffForHumans() }}</p>
               </div>
                
                <button type="submit" class="mark-as-read btn btn-sm btn-primary" data-id="{{ $notification->id }}"> Marcar como leido</button>
              </div>

              @if ($loop->last)
              <div class="link-notification">
              <a href="#" id="mark-all">Marcar todo como leido</a>
              </div>
              @endif

              @empty
                  No tienes Notificaciones sin Leer
              @endforelse

              @endif

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      <!-- /.card -->


<script>

  function sendMarkRequest(id = null){
  // 
    return $.ajax("{{ route('markNotification') }}", {
      method: 'POST',
      data: {
        _token: "{{ csrf_token() }}",
        id
      }
    });
  }



  $(function(){
    $('.mark-as-read').click(function(){
      let request = sendMarkRequest($(this).data('id'));

      request.done(() => {
        refrescar();
        $(this).parents('div.alert').remove();
      });
    });


    $('#mark-all').click(function(){
      let request = sendMarkRequest();

      request.done(()=> {
        refrescar();
        $('div.alert').remove();
      });
    });


  });


   function refrescar(){
    //Actualiza la página
    location.reload();
  }

</script>

      @endsection