<?php

namespace Club\Http\Controllers;

use Club\Athlete;
use Illuminate\Http\Request;
use Redirect;
class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Athlete::create([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'dni'=>$request->dni,
            'date_n'=>$request->date_n,
            'goles'=>$request->goles,
            'attendances'=>$request->attendances
        ]);
        return Redirect::route('Template.index')->->with('success','<script>swal({
            title: "Exito!",
            text: "Se a agregado un nuevo Atleta",
            icon: "success",
        })</script>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Club\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function searchAthleta($dni){
        $athlete=Athlete::where('dni','like','%'.$dni.'%')->get();
        return $athlete;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Club\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Club\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Club\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Se a borrado con exito el Atleta",
            icon: "success",
        })</script>');
    }
}
