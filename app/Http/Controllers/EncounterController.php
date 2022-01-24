<?php

namespace Club\Http\Controllers;

use Club\Encounter;
use Illuminate\Http\Request;
use Response;

class EncounterController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if(request()->ajax()){
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $data= Encounter::whereDate('start', '>=', $start)->whereDate('end', '<=', $end)->get(['id','title','start', 'end']);    
            return Response::json($data);
        }else{
            $data= Encounter::all();    
            // dd($data);
        }
        return view('Encounter.index',compact('data'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $encounter=Encounter::create([
            'title'=>$request->title,
            'start'=>$request->start,
            'end'=>$request->end,
            'club_home_id'=>$request->club_home_id,
            'club_visitor_id'=>$request->club_visitor_id
        ]);
        return Response::json($encounter);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Club\Encounter  $encounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $encounter=Encounter::where('id',$id)->first();
        $encounter->update([
            'title'=>$request->title,
            'start'=>$request->start,
            'end'=>$request->end,
            'club_home_id'=>$request->club_home_id,
            'club_visitor_id'=>$request->club_visitor_id
        ]);
        return Response::json($encounter);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Club\Encounter  $encounter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encounter=Encounter::where('id',$id)->delete();
        return Response::json($encounter);
    }
}
