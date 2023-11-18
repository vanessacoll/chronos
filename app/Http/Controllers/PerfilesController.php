<?php

namespace App\Http\Controllers;

use App\Models\Perfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $perfiles = Perfiles::where('id_cuenta', Auth::user()->id_cuenta)->get(); 
        return view('perfiles.perfiles_index',compact('perfiles'));
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
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function show(Perfiles $perfiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfiles $perfiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfiles $perfiles)
    {
        //
        $perfil = Perfiles::find($perfiles->id_perfil);
       // dd($perfil);
        $perfiles->id_status = 5;
        $perfiles->saveOrFail();
        return redirect()->route("perfiles.index")->with(["message" => "Perfil actualizado exitosamente",
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfiles $perfiles)
    {
        //
    }
}
