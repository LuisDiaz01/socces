<?php

namespace Club\Http\Controllers;

use Illuminate\Http\Request;
use Club\Rol;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol=Rol::all();
        return view('Rol.index',compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol=Rol::create(['rol'=>$request->rol]);
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "EL rol se creado",
            icon: "success",
        })</script>');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rol=Rol::where('id',$id)->firstOrFail();
        $rol->rol=$request->rol;
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "El rol se edito con exito",
            icon: "success",
        })</script>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol=Rol::where('id',$id)->firstOrFail()->delete();
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "El rol se elimino con exito",
            icon: "success",
        })</script>');
    }
}
