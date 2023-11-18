<!DOCTYPE html>
<html>
 <!-- inicio head-->
@include('layout.head')
  <!-- fin head-->

<body class="hold-transition skin-blue sidebar-mini">
  <div id="SeccionRecargar">
<div class="wrapper">

 <!-- inicio header-->
  @include('layout.navbar')
 <!-- fin header-->

 <!-- inicio aside-->
   @include('layout.aside')
 <!-- fin aside-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  
       <!-- Main content -->
    <section class="content">
 <div class="container-fluid">
 
  

  <div class="row">
                            <div class="col-xl-4">


                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-12">
                                               
                                                    <h5 class="widget-user-desc p-3 mt-2">Bienvenido de vuelta {{Auth::user()->nom_cuentas }}!</h5>
                                            
                                            </div>
                                        
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="row">
                                            <div class="col-sm-5">
                                              
                                                    <img src="{{ asset('storage/image_profile/'.Auth::user()->image_path ) }}" alt="" class="img-thumbnail rounded-circle ">
                                                
                                                 
                                                        <a href="{{ route('cuentas.index') }}" class="btn btn-primary btn-sm mt-2 btn-block">Ver perfil</a>
                          
                                            </div>

                                            <div class="col-sm-7">
                                                <div class="pt-2">

                                                    <div class="row">

 <h5 class="font-size-15">

          @if(isset($session->fecha_fin))
          
          <i class="fa fa-circle text-danger"></i> Offline
          @else
          <i class="fa fa-circle text-success"></i> Online
          @endif
 </h5>

                                                    </div>
                                                    <div class="row">
                                                      
                                                      <p class="text-muted mb-0">Ultimo inicio de Session</p>
                                                            
                                                      <h6 class="font-size-12">{{ $session->fecha_inicio }}</h6>

                                                    </div>  
                                                    <div class="row">
                                                        
                                                      <p class="text-muted mb-0">Estatus Licencia </p></div>
<div class="row">
<h6 > 
        {{ $licencia->statuses->des_status}}
</h6>
</div>
                                                             
                                                    
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              
              <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-chart-pie"></i>
                    Tickets Creados por Perfil para el mes de {{$mes}}
                    </h3>
                  </div>
                  <div class="card-body">
 <canvas id="pie-chart" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
</div>

              </div>

                            </div>
                            
                            <div class="col-xl-8">
                              

                                <div class="row">

                                    <div class="col-md-4">
                                      <div class="small-box bg-black">
                                        <div class="inner">
                                          <h3>{{ $routers->count() }}</h3>
                                          <p>Routers</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fas fa-hdd"></i>
                                        </div>
                                          <a href="{{ route('routers.index') }}" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>
                                    </div>

                                    <div class="col-md-4">

                                      <div class="small-box bg-black">
                                        <div class="inner">
                                          <h3>{{ $perfiles->count() }}</h3>
                                          <p>Perfiles</p>
                                        </div>
                                        <div class="icon">
                                          <i class="fas fa-clock"></i>
                                        </div>
                                          <a href="{{ route('perfiles.index') }}" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        
                                     <div class="small-box bg-black">
                                      <div class="inner">
                                        <h3>{{ $tickets->count() }}</h3>
                                        <p>Tickets</p>
                                      </div>
                                      <div class="icon">
                                        <i class="fas fa-ticket-alt"></i>
                                      </div>
                                        <a href="{{ route('tickets.index') }}" class="small-box-footer">Ver <i class="fas fa-arrow-circle-right"></i></a>
                                      </div>

                                    </div>
                                </div>
                                <!-- end row -->

                                
      <div class="card card-primary card-outline">
        <div class="card-header">
           
            <h3 class="card-title">

                <i class="fas fa-chart-line"></i> Tickets Creados por Router para el  mes de {{$mes}} <br> al {{$date}}
            </h3>
           
<div class="card-tools">
 <select class="form-control select2" id="select-routers">
              @foreach($routers_select as $routers_s)
                  <option value="{{$routers_s->id_routers}}">  {{$routers_s->nom_routers}}
                  </option>
                @endforeach
</select>

</div>
       
         </div>
          <div class="card-body mt-1">
         <div class="chart" id="contenedor">
<canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
</div>
          </div>

    <div class="card-footer">
<div class="row float-right">

   Cantidad de Tickets Creados en &nbsp<b><div class=" text-right" id="text5" ></div></b>:&nbsp<div class=" text-right" id="text4" ></div>
</div>
 
    </div>

      </div>


  </div>
</div>


</div>

<div class="row">
<div class="col-md-12 pl-3 pr-3">
<div class="card card-primary card-outline">
<div class="card-header">
<h5 class="card-title"><i class="fas fa-chart-bar"></i> Tickets Creados para el  mes de {{$mes}} al {{$date}}</h5>
</div>

<div class="card-body">
<div class="row">
<div class="col-md-8">

<div class="chart">
<canvas id="barChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
</div>

</div>

<div class="col-md-4">

  <p class="text-center">
<strong>Totales Tickets</strong>
</p>

<div class="progress-group">
Tickets sin Usar
 <span class="float-right"><b>{{ $total_tickets_sinusar->count() }}</b>/{{ $total_tickets->count() }}</span>
<div class="progress">
<div id="bar2" class="progress-bar bg-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
</div>
</div>

<div class="progress-group">
Tickets en Uso
<span class="float-right"><b>{{ $total_tickets_enuso->count() }}</b>/{{ $total_tickets->count() }}</span>
<div class="progress">
<div id="bar1" class="progress-bar bg-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
</div>
</div>


<div class="progress-group">
Tickets Consumidos
<span class="float-right"><b>{{ $total_tickets_consumido->count() }}</b>/{{ $total_tickets->count() }}</span>
<div class="progress" >
<div id="bar" class="progress-bar bg-primary active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
</div>
</div>

<div class="row">
<div class="col-sm-4 col-8">
<div class="description-block">
<div id="text2" class="description-header"></div>
<span>Total Tickets sin Usar</span>
</div>

</div>

<div class="col-sm-4 col-8">
<div class="description-block border-left border-right">
<div id="text1" class="description-header"></div>
<span>Total Tickets en Uso</span>
</div>

</div>

<div class="col-sm-4 col-8">
<div class="description-block">
<div id="text" class="description-header"></div>
<span>Total Tickets Consumidos</span>
</div>

</div>

</div>

</div>

</div>

</div>


</div>

</div>

</div>

</div>


    
    
    </section>
    <!-- /.content -->
    </div>

  <!-- /.content-wrapper -->
 

<!--inicio footer-->
  @include('layout.footer')
<!-- fin footer -->

   <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

</div>
  </div>
<!-- ./wrapper -->

<!-- inicio jQuery 3 -->

@include('layout.jquery')

 <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: cData.label,
            data: cData.data,
            backgroundColor: [
                'rgba(0, 0, 0, 0.8)',
                'rgba(64,64,64,0.8)',
                'rgba(128,128,128, 0.8)',
                'rgba(192, 192, 192, 0.8)',
                'rgba(58, 0, 25, 0.8)',
                'rgba(51, 0, 51, 0.8)',
                'rgba(25, 0, 51, 0.8)',
                'rgba(0, 0, 51, 0.8)',
                'rgba(0, 25, 51, 0.8)',
                'rgba(0, 51, 51, 0.8)',
                'rgba(0, 51, 25, 0.8)',
                'rgba(0, 51, 0, 0.8)',
                'rgba(25, 51, 0, 0.8)',
                'rgba(51, 51, 0, 0.8)',
                'rgba(51, 25, 0, 0.8)',
                'rgba(51, 0, 0, 0.8)',
            ]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
      
        legend: {
          display: true,
          position: "right",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "doughnut",
        data: data,
        options: options
      });

       //--------------
    //- AREA CHART -
    //--------------

    

     var cData2 = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx2 = $("#barChart");
 
      //pie chart data
      var data2 = {
        labels: cData2.week1,
        datasets: [
          {
            label: cData2.label2[0],
            data: cData2.data2,
            backgroundColor     : 'rgba(0,0,0,0.8)',
            borderColor         : 'rgba(29,29,29,0.7)',
          },
          {
            label: cData2.label3[0],
            data: cData2.data3,
            backgroundColor     : 'rgba(64,64,64,0.8)',
            borderColor         : 'rgba(101,101,101,0.7)'

          },
          {
            label: cData2.label4[0],
            data: cData2.data4,
            backgroundColor     : 'rgba(128,128,128,0.8)',
            borderColor         : 'rgba(156,156,156,0.7)'
          }
        ]
      };
 
      //options
        var options2 = {
        responsive: true,

       title: {
        display: true,
        position: "bottom",
        text: 'Mes'
      },
      
        legend: {
          display: true,
          position: "top",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
},
       scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
        
      };
 
      //create Pie Chart class object
      var chart2 = new Chart(ctx2, {
        type: "bar",
        data: data2,
        options: options2
      });

  });
</script>

<script>
  //Cuando la página esté cargada completamente
  $(document).ready(function(){
    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(refrescar, 10000000);
  });
  function refrescar(){
    //Actualiza la página
  // location.reload();
  // 
    $("#SeccionRecargar").load("/home");
  }
</script>

<script type="text/javascript">

$(function() {
  $(document).ready(function()
  {

 var total = <?php echo $total_tickets->count(); ?>;

 if(total == 0){

  total = 1;

 }


 var current = <?php echo $total_tickets_consumido->count(); ?>;
 var percent = parseFloat(current / total) * 100;
 percent = percent.toFixed();
  $('#bar').css('width', percent + '%');
  $('#text').text(percent + '%');

 var current_1 = <?php echo $total_tickets_enuso->count(); ?>;
 var percent_1 = parseFloat(current_1 / total) * 100;
 percent_1 = percent_1.toFixed();
  $('#bar1').css('width', percent_1 + '%');
  $('#text1').text(percent_1 + '%');


 var current_2 = <?php echo $total_tickets_sinusar->count(); ?>;
 var percent_2 = parseFloat(current_2 / total) * 100;
 percent_2 = percent_2.toFixed();
  $('#bar2').css('width', percent_2 + '%');
  $('#text2').text(percent_2 + '%');


  }); 
});
</script>



<!-- fin jQuery 3 -->
</body>
</html>



