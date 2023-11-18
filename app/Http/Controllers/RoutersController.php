<?php

namespace App\Http\Controllers;

use App\Models\Routers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $routers = Routers::where('id_cuenta', Auth::user()->id_cuenta)->get(); 
        return view('routers.routers_index',compact('routers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Routers  $routers
     * @return \Illuminate\Http\Response
     */
    public function show(Routers $routers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Routers  $routers
     * @return \Illuminate\Http\Response
     */
    public function edit(Routers $routers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Routers  $routers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routers $routers)
    {
        //
        $router = Routers::find($routers->id_routers);
        //dd($routers);
        $routers->id_status = 5;
        $routers->saveOrFail();
        return redirect()->route("routers.index")->with(["message" => "Router actualizado exitosamente",
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routers  $routers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routers $routers)
    {
        //
    }

   
}
