<?php

namespace Club\Http\Controllers;

use Illuminate\Http\Request;

use Club\Club;
use Club\Post;


/*use Auth;*/
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
*/
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(){
        $club= Club::all();
        $post= Post::all();
        return view('home',compact('club','post'));    
    }
    public function chart(){
       
            $teacher=12;
            $coordinadores=34;
            $students=5;
            $area= 65;
            $content= 45;
            $contentV= 231;
            $matter= 53;
            $career= 1;

            $label=['Estudiantes','Profesores','Coordinadores','Areas','Carreras','Materias','Contenidos','Versiones de Contenidos'];
            $data = [$students,$teacher,$coordinadores,$area,$career,$matter,$content,$contentV];
            $json=array("label"=>$label,"data"=>$data);
            return $json;

       

    }
}
