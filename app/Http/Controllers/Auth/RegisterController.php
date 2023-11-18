<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Session;
use App\Models\Sincronizacion;
use App\Models\Licencias;
use App\Models\Perfiles;
use App\Models\Routers;
use App\Models\Tickets;
use App\Models\Cuentas_eliminadas;
use Illuminate\Support\Facades\Auth;
use App\Traits\Controllers\ChangeImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeleteUser;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use ChangeImageTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => ['logout','index','settings','sessiones', 'imagen', 'update', 'destroy', 'store']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = Session::where('id_cuenta', Auth::user()->id_cuenta)->orderBy('id_session', 'desc')->first();

        $sincronizacion = Sincronizacion::where('id_cuenta', Auth::user()->id_cuenta)->orderBy('id_sincronizacion', 'desc')->first();

        $licencia = Licencias::where('id_licencia', Auth::user()->id_licencia)->first();

        if ($sincronizacion === null) {
        $fecha = $session->fecha_inicio;
        }else{     
        $fecha = $sincronizacion->fecha;
        }

        $user = User::where('id_cuenta', Auth::user()->id_cuenta)->first();

        return view('cuenta.cuentas_index',compact('session','fecha','licencia','user'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sessiones()
    {
 
        $sessiones = Session::where('id_cuenta', Auth::user()->id_cuenta)->get();
        $sincronizaciones = Sincronizacion::where('id_cuenta', Auth::user()->id_cuenta)->get();
      
      return view('cuenta.sessiones_index',compact('sessiones','sincronizaciones'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(User $user)
    {
            return view('cuenta.settings_index', ['user' => $user]);
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remota  $remota
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $data     = User::find($user->id_cuenta);
        

        $cuenta = new Cuentas_eliminadas();
        $cuenta->id_cuenta   = $data->id_cuenta;
        $cuenta->nom_cuentas = $data->nom_cuentas;
        $cuenta->ape_cuentas = $data->ape_cuentas;
        $cuenta->id_licencia = $data->id_licencia;
        $cuenta->email       = $data->email;
        $cuenta->password    = $data->password;
        $cuenta->image_path  = $data->image_path;

        $cuenta->saveOrFail();

        Mail::to('rmendoza9@gmail.com')->send(new DeleteUser($data));

        $tickets  = Tickets::where('id_cuenta', $user->id_cuenta)->delete();
        $perfiles = Perfiles::where('id_cuenta', $user->id_cuenta)->delete(); 
        $routers  = Routers::where('id_cuenta', $user->id_cuenta)->delete();
        $session  = Session::where('id_cuenta', $user->id_cuenta)->delete();
        $sincronizacion = Sincronizacion::where('id_cuenta', $user->id_cuenta)->delete();
        $user->delete();

        return redirect()->route('login');
    }


     public function store(Request $request)
    {

         $validator = \Validator::make($request->all(), [
    'password_actual' => 'required|string|min:6',
    'nueva_password' => 'required|string|min:6|different:password_actual',
    'confirmar_password' => 'required|same:nueva_password|string|min:6',

        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

    if (Hash::check($request->password_actual, Auth::user()->password)) {
       
         $password = Hash::make($request->nueva_password);
        

        $Update = User::where('id_cuenta', Auth::user()->id_cuenta)->update(['password' => $password ]);
       

      return response()->json(['success'=>'Contraseña Cambiada Exitosamente']);

        
        }else{
       

          
    return response()->json(['errors'=>['password_actual' => 'La Contraseña Ingresada es Distinta a la Contraseña Actual']]);  
          
         }
    }
}
