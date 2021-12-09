<?php

namespace Club\Http\Controllers;

use Club\Template;
use Club\Division;
use Club\Athlete;
use Illuminate\Http\Request;
use Redirect;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $template=Template::all();
        $division=Division::all();
        return view('Template.index', compact('template','division'));
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
        $athlete=Athlete::where('dni',$request->dni)->first();

        $template=Template::create([
            'athlete_id'=>$athlete->id,
            'division_id'=>$request->division_id,
        ]);
        return Redirect::route('Template.index')->withSuccess('Se ha fichado el atleta con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Club\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Club\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Club\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Club\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        //
    }
}
