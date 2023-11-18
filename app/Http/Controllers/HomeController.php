<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfiles;
use App\Models\Routers;
use App\Models\Tickets;
use App\Models\Session;
use App\Models\Estatus;
use App\Models\User;
use App\Models\Sincronizacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Licencias;
use Carbon\Carbon;
use App\Events\PostEvent;
use App\Events\PostVencimientoEvent;
use App\Notifications\PostNotification;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *x
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        //BUSQUEDA DE DATOS PARA LA GENERACION DE NOTIFICACIONES DE VENCIMIENTO DE LICENCIA

        $ActualDate = now()->addDays(30);
        $ActualDate = $ActualDate->format('Y-m-d');
        $licencia = Licencias::where('id_licencia', Auth::user()->id_licencia)
        ->where('status', 1)
        ->first();        

if ($licencia === null) {

    $licenciavencida = Licencias::where('id_licencia', Auth::user()->id_licencia)
        ->where('nt_lvc', false)
        ->first();

        if($licenciavencida){
        
        event(new PostVencimientoEvent($licencia));
         
        $Update = Licencias::where('id_licencia', Auth::user()->id_licencia)->update(['nt_lvc' => true]);
        
        }
  

}else{

    $fecha_vencimiento = $licencia->fecha_vencimiento;

         if (( $fecha_vencimiento <= $ActualDate) && $licencia->nt_vc === false) {
       
        event(new PostEvent($licencia));

        $Update = Licencias::where('id_licencia', Auth::user()->id_licencia)->update(['nt_vc' => true]);

        }
}

     
        //DATOS PARA LA GRAFICAS

        $date = Carbon::now()->locale('es'); 

        setlocale(LC_ALL, 'es_ES');
        $fecha = Carbon::parse($date);
        $fecha->format("F"); // Inglés.
        $mes = $fecha->formatLocalized('%B');   

        $tickets = Tickets::where('id_cuenta', Auth::user()->id_cuenta)->get(); 
        $routers = Routers::where('id_cuenta', Auth::user()->id_cuenta)->get(); 
        $perfiles = Perfiles::where('id_cuenta', Auth::user()->id_cuenta)->get(); 
        $session = Session::where('id_cuenta', Auth::user()->id_cuenta)->orderBy('id_session', 'desc')->first();
        $sincronizacion = Sincronizacion::where('id_cuenta', Auth::user()->id_cuenta)->orderBy('id_sincronizacion', 'desc')->first();

        if ($sincronizacion === null) {
        $fecha = 'No se ha Sincronizado';
        }else{     
        $fecha = $sincronizacion->fecha;
        }

        $data_perfiles = DB::table('perfiles')
        ->join('tickets','perfiles.id_perfil','tickets.id_perfil')
        ->select('perfiles.nombre', DB::raw('COUNT(tickets.id_perfil) as num'))
        ->where('tickets.id_cuenta', Auth::user()->id_cuenta)
        ->whereMonth('tickets.fecha_creacion', date('m'))
        ->whereYear('tickets.fecha_creacion', date('Y'))
        ->groupBy('perfiles.nombre')
        ->get();
       
      $data = [];
 
     foreach($data_perfiles as $row) {
        $data['label'][] = $row->nombre;
        $data['data'][] = (int)$row->num;
      }

        $routers_select = DB::table('routers')
        ->join('tickets','routers.id_routers','tickets.id_routers')
        ->select('routers.nom_routers', 'tickets.id_routers')
        ->where('tickets.id_cuenta', Auth::user()->id_cuenta)
        ->groupBy('routers.nom_routers')
        ->groupBy('tickets.id_routers')
        ->get();


      $week = DB::table('tickets')
        ->select(DB::raw('extract(month from tickets.fecha_creacion) week'))
        ->where('tickets.id_cuenta', Auth::user()->id_cuenta)
        ->whereMonth('tickets.fecha_creacion', date('m'))
        ->whereYear('tickets.fecha_creacion', date('Y'))
        ->groupBy('week')
        ->get();

        foreach($week as $row2) {
        $data['week1'][] = $row2->week;

      }

        $data_tickets_sinusar = DB::table('tickets')
        ->join('estatus','tickets.id_status','estatus.id_status')
        ->select('estatus.des_status', DB::raw('COUNT(tickets.id_ticket) as num'), DB::raw('extract(month from tickets.fecha_creacion) week'))
        ->where('tickets.id_cuenta', Auth::user()->id_cuenta)
        ->where('tickets.id_status', 2)
        ->whereMonth('tickets.fecha_creacion', date('m'))
        ->whereYear('tickets.fecha_creacion', date('Y'))
        ->groupBy('estatus.des_status')
        ->groupBy('week')
        ->get();


      if(count($data_tickets_sinusar) > 0){

        foreach($data_tickets_sinusar as $row3) {
        $data['label2'][] = $row3->des_status;
        $data['data2'][] = (int)$row3->num;

      }

      }else{

        $data['label2'][] = 'SIN USAR';
        $data['data2'][] = 0;  
        
      }

        $data_tickets_enuso = DB::table('tickets')
        ->join('estatus','tickets.id_status','estatus.id_status')
        ->select('estatus.des_status', DB::raw('COUNT(tickets.id_ticket) as num'), DB::raw('extract(month from tickets.fecha_creacion) week'))
        ->where('tickets.id_cuenta', Auth::user()->id_cuenta)
        ->where('tickets.id_status', 3)
        ->whereMonth('tickets.fecha_creacion', date('m'))
        ->whereYear('tickets.fecha_creacion', date('Y'))
        ->groupBy('estatus.des_status')
         ->groupBy('week')
        ->get();


    if(count($data_tickets_enuso) > 0){

        foreach($data_tickets_enuso as $row4) {
        $data['label3'][] = $row4->des_status;
        $data['data3'][] = (int)$row4->num;
        }

      }else{

        $data['label3'][] = 'EN USO';
        $data['data3'][] = 0;  
        
      }

        $data_tickets_consumido = DB::table('tickets')
        ->join('estatus','tickets.id_status','estatus.id_status')
        ->select('estatus.des_status', DB::raw('COUNT(tickets.id_ticket) as num'), DB::raw('extract(month from tickets.fecha_creacion) week'))
        ->where('tickets.id_cuenta', Auth::user()->id_cuenta)
        ->where('tickets.id_status', 4)
        ->whereMonth('tickets.fecha_creacion', date('m'))
        ->whereYear('tickets.fecha_creacion', date('Y'))
        ->groupBy('estatus.des_status')
         ->groupBy('week')
        ->get();


    if(count($data_tickets_consumido) > 0){

        foreach($data_tickets_consumido as $row5) {
        $data['label4'][] = $row5->des_status;
        $data['data4'][] = (int)$row5->num;

      }

      }else{    

      $data['label4'][] = 'CONSUMIDO';
      $data['data4'][] = 0;
        
      }
       

 
       $data['chart_data'] = json_encode($data);


       // TOTALES FICHAS BAR PROGRESS
        
       $total_tickets = Tickets::where('id_cuenta', Auth::user()->id_cuenta)
       ->whereMonth('fecha_creacion', date('m'))
       ->whereYear('tickets.fecha_creacion', date('Y'))
       ->get();

       $total_tickets_sinusar = Tickets::where('id_cuenta', Auth::user()->id_cuenta)
       ->whereMonth('fecha_creacion', date('m'))
       ->whereYear('tickets.fecha_creacion', date('Y'))
       ->where('id_status', 2)
       ->get();

       $total_tickets_enuso = Tickets::where('id_cuenta', Auth::user()->id_cuenta)
       ->whereMonth('fecha_creacion', date('m'))
       ->whereYear('tickets.fecha_creacion', date('Y'))
       ->where('id_status', 3)
       ->get();
 
       $total_tickets_consumido = Tickets::where('id_cuenta', Auth::user()->id_cuenta)
       ->whereMonth('fecha_creacion', date('m'))
       ->whereYear('tickets.fecha_creacion', date('Y'))
       ->where('id_status', 4)
       ->get();

       $licencia = Licencias::where('id_licencia', Auth::user()->id_licencia)->first();
 

       return view('home',compact('tickets','routers','perfiles','session','fecha', 'routers_select', 'data_perfiles','mes' , 'date', 'total_tickets', 'total_tickets_consumido', 'total_tickets_sinusar', 'total_tickets_enuso','licencia'), $data);
    }



    public function ObtenerResultado($id_router)
    {
        
        $data_routers = DB::table('routers')
        ->join('tickets','routers.id_routers','tickets.id_routers')
        ->select('routers.nom_routers', DB::raw('COUNT(tickets.id_routers) as num'), DB::raw('extract(day from tickets.fecha_creacion) week'))
        ->where('tickets.id_cuenta', Auth::user()->id_cuenta)
        ->where('tickets.id_routers', $id_router)
        ->whereMonth('tickets.fecha_creacion', date('m'))
        ->whereYear('tickets.fecha_creacion', date('Y'))
        ->groupBy('routers.nom_routers')
        ->groupBy('week')
        ->get();

        foreach($data_routers as $row1) {
        $data['label1'][] = $row1->nom_routers;
        $data['data1'][] = (int)$row1->num;
        $data['week'][] = $row1->week;

      }

      $data['chart_data'] = json_encode($data);

        return $data;
    }


    public function post()
    {
        
       $postNotifications = auth()->user()->unreadNotifications;
       return view('vendor.notifications.notifications_index', compact('postNotifications'));
    }

    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
                ->when($request->input('id'), 
                    function($query) use ($request){
                        return $query->where('id', $request->input('id'));
                })->markAsRead();
       
       return response()->noContent();
    }
}
