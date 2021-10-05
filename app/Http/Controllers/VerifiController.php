<?php

namespace Club\Http\Controllers;

use Illuminate\Http\Request;
use Club\MatterUser;
use Club\Download;
use Club\Teacher;
use Club\User;
use Auth;
class VerifiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('verifi')->with('message','Usuario no Verificado');
    }
    public function AdminVerifyIndex(){
        return view('adminVerify')->with('message','Usuario no Verificado Por el Administrador');
    }

    public function verify($code)
    {
        $user = User::where('confirmation_code','=',$code)->first();

        if (! $user){
            return redirect('/');
        }
        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return redirect('/')->with('notification', 'Has confirmado correctamente tu correo!');
    }
}
