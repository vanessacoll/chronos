<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/jszip/jszip.min.js"></script>
<script src="/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="/adminlte/dist/js/demo.js"></script>


<!--desde aca nuevos-->


<script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>


<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>

<script src="/adminlte/plugins/sparklines/sparkline.js"></script>

<script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>

<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>

<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>



<script src="/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>






<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>



<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Page specific script -->
<script type="text/javascript">
function mostrarPassword(id, icon){
    var cambio = document.getElementById(id);
    if(cambio.type == "password"){
      cambio.type = "text";
      $(icon).removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $(icon).removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
</script>

@if(session()->has('process_result'))
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 7000
    });
  
     Toast.fire({
        icon: '{{ session('process_result')['status']}}',
        title: '{{ session('process_result')['content']}}'
      })
    
  });
</script>
@endif


 
<script>
$(document).ready(function(){

  function onSelectRouter(){

    var id_router = $('#select-routers').val();
 
      $.get('/routers/'+id_router, function(data){
//esta el la peticion get, la cual se divide en tres partes. ruta,variables y funcion
      //  alert(data);
      //  
    
document.getElementById("areaChart").remove();

var canvas = document.createElement("canvas");
canvas.id = "areaChart"; 
canvas.height = 40;
canvas.width = 100;
document.getElementById("contenedor").appendChild(canvas);

    var cData1 = eval(data);
    var ctx1 = $("#areaChart");

      
var sum = 0;

for (var i = 0; i < cData1.data1.length; i++) {
    sum += cData1.data1[i];
}

 $('#text5').text(cData1.label1[0]);
 $('#text4').text(sum);

 
      // chart data
      var data1 = {
        labels: cData1.week,
        datasets: [

          {
            label: cData1.label1[0] ,
            data: cData1.data1,
            backgroundColor     : 'rgba(0,0,0,8)',
            borderColor         : 'rgba(0,0,0,0.7)',
            fill: false,
          }
        ]
      };
 
      //options
    var options1 = {
        responsive: true,

        title: {
        display: true,
        position: "bottom",
        text: 'Dias'
      },

        plugins: {
      filler: {
        propagate: false,
      }
    },
    
        legend: {
          display: true,
          position: "top",
          labels: {
            fontColor: "#333",
            fontSize: 16
          },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
        }
      };
 
      //create Pie Chart class object
      var chart12 = new Chart(ctx1, {
        type: "line",
        data: data1,
        options: options1
      });

      });

      return false;
    
}

  onSelectRouter();

  $('#select-routers').on('destroy');
  $('#select-routers').on('change', onSelectRouter);



});


</script>
