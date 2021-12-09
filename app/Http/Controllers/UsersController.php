<?php

namespace Club\Http\Controllers;

use Illuminate\Http\Request;
use Club\User;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user=User::all();
        return view('Users.index',compact('user'));
    } 
    
    public function profile(){
        return view('profile.index');
    }

    public function update(Request $request, $id){
        $user=User::where('id',$id)->firstOrFail();
        $user->name=$request->name;
        $user->lastname=$request->lastname;
        $user->save();
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Exito al editar sus datos personales",
            icon: "success",
        })</script>');
    }
    public function Supdate(Request $request,$id){
        $user=User::where('id',$request->id)->firstOrFail();
        $user->name=$request->name;
        $user->dni=$request->dni;
        $user->lastname=$request->lastname;
        $user->save();
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Exito al editar sus datos personales",
            icon: "success",
        })</script>');
    }

    public function destroy($id)
    {
        $user=User::where('id',$id)->firstOrFail();
        $user->delete();
        return back()->with('success','<script>swal({
            title: "Exito!",
            text: "Se a borrado con exito el usuario",
            icon: "success",
        })</script>');
    }
}
