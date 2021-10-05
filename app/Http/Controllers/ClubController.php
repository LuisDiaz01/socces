<?php

namespace Club\Http\Controllers;

use Club\Club;
use Club\Stadium;
use Club\Network;
use Validator, Redirect, Response, File;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club=Club::all();
        $stadium=Stadium::all();
        return view('Club.index',compact('club','stadium') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club= new Club();
        return view('Club.create',compact('club'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $image=$request->file('image');
        $destinationPath = 'public/image/'; // upload path
        $profileImage = date('YmdHis') . "." . $image[0]->getClientOriginalExtension();
        $image[0]->move($destinationPath, $profileImage);
        $network=Network::create(['facebook'=>$request->facebook,'twitter'=>$request->twitter,'instagram'=>$request->instagram]);
        $club= Club::create([
            'image'=>$destinationPath .''.$profileImage,
            'name'=>$request->name,
            'address'=>$request->address,
            'mision'=>$request->mision,
            'history'=>$request->history,
            'stadium_id'=>$request->stadium_id,
            'network_id'=>$network->id,
            'rif'=>$request->rif,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
        ]);
        return Redirect::route('Club.index')->withSuccess('Se ha credo un club con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Club\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club=Club::where('id',$club->id)->first();
        return view('Club.show',compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Club\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club=Club::where('id',$id)->first();
        return view('Club.update',compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Club\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $club=Club::where('id',$id)->first();
        $club->update([
            'name'=>$request->name,
            'mision'=>$request->mision,
            'history'=>$request->history,
            'stadium_id'=>$request->stadium_id,
            'address'=>$request->address,
            'network_id'=>$request->network_id,
            'rif'=>$request->rif,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
        ]);
        return $club;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Club\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club=Club::where('id',$id)->first();
        $club->delete();
        return $club;
    }
}
