<?php

namespace Club\Http\Controllers;

use Club\Division;
use Validator, Redirect, Response, File;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division=Division::all();
        return view('Division.index',compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Division::create([
            'division'=>$request->division
        ]);
        return Redirect::route('Division.index')->withSuccess('Se ha credo un division con exito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Club\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $division=Division::where('id',$id)->first();
        $division->update([
            'division'=>$request->division
        ]);
        return Redirect::route('Division.index')->withSuccess('Se ha editado un division con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Club\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division=Division::where('id',$id)->first();
        $division->delete();
        return $division;
    }
}
