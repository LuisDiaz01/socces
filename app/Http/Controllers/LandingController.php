<?php

namespace Club\Http\Controllers;

use Illuminate\Http\Request;
use Club\Post;
use Club\Club;
use Club\User;
use Club\Type;
use Club\Template;
use Club\Division;

class LandingController extends Controller
{
    
	public function index(){
		$post=Post::paginate(5);
		$club=Club::find(1);
		$user=User::where('rol_id','=',3)->orWhere('rol_id','=',4 )->get();
		return view('Landing.index',compact('post','club','user'));
	}
	public function encounter(){
		$club=Club::find(1);
		$encounter=Encounter::all();
		return view('Landing.encounter',compact('encounter','club'));
	}
	public function galery(){
		$post=Post::paginate(5);
		$type=Type::all();
		$club=Club::find(1);
		return view('Landing.galery',compact('post','club','type'));
	}
	public function template(){
		$template=Template::all();
		$division=Division::all();
		$club=Club::find(1);
		return view('Landing.template',compact('template','club','division'));
	}

}
