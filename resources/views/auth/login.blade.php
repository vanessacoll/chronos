<!DOCTYPE html>
<html lang="en">

<!-- head-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Phonett | Chronos Web</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

  <link rel="shortcut icon" sizes="192x192" href="{{ asset('/adminlte/dist/img/n1.png') }}">


  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="/adminlte/plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css?v=3.2.0">

  <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

<link href="{{ asset('css/login.css') }}" rel="stylesheet">

</head>

 <section class="main">
  <div class="layer">
    <!---728x90--->

    <div class="bottom-grid">
      <div class="logo">
        <img src="/adminlte/dist/img/letras-p.png" alt="Phonett Logo" class="brand-image">
      </div>
      


    </div>
    <div class="content-w3ls">
      <div class="text-center icon">
        <img src="/adminlte/dist/img/chronos_letras.png" alt="Phonett Logo" class="brand-image-logo" style="opacity: .8"> 
      </div>
      <!---728x90--->
      <div class="content-bottom">
        <form method="POST" action="{{ route('login') }}">
                        @csrf


          <div class="field-group">
            <span class="fa fa-envelope" aria-hidden="true"></span>
            <div class="wthree-field">

              <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

               

            </div>

           
          </div>
          


          <div class="field-group">
            <span class="fa fa-lock" aria-hidden="true"></span>
            <div class="wthree-field">

              <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Password"  required autocomplete="current-password">

            

            </div>
             
          </div>

          @error('email')
                  
             <div style="display: flex; ">    
               <p class="text-white" style="margin: auto;">{{ $message }}</p>
             </div>

          @enderror

           @error('password')
                
             <div style="display: flex; ">    
              <p class="text-white" style="margin: auto;">{{ $message }}</p>
             </div>
                
          @enderror


          <div class="wthree-field">
            <button type="submit" class="btn">Iniciar sesión</button>
          </div>

          <ul class="list-login">
            <li class="switch-agileits">
              <label class="switch">
                 <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                 <span class="slider round"></span>
                                  <label for="remember">
                                  Recuérdame
                                  </label>
              </label>
            </li>
            <li>
              @if (Route::has('password.request'))
                                    <a class="text-right" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu Contraseña?') }}
                                    </a>
              @endif
            </li>
            <li class="clearfix"></li>
          </ul>
          
        </form>
      </div>
    </div>
    <!---728x90--->
    <div class="bottom-grid1 mt-5">
      <div class="links">
        <ul class="links-unordered-list">
          <li class="">
            <a href="https://www.phonett.net/quienes-somos/" target="_blank" class="">Nosotros</a>
          </li>
          <li class="">
            <a href="https://www.phonett.net/politica-de-privacidad-para-aplicaciones-moviles-apps/" target="_blank" class="">Politica de Privacidad</a>
          </li>
          <li class="">
            <a href="https://www.phonett.net/terminos-y-condiciones-de-uso-app/" target="_blank" class="">Terminos y Condiciones</a>
          </li>
        </ul>
      </div>
      <div class="copyright">
        <p>Copyright &copy; 2022 <a href="https://www.phonett.net/">Phonett</a>. All rights reserved.
        </p>
      </div>
    </div>
    </div>
</section>



<!-- jQuery -->
@include('layout.jquery')

</body>
</html>
