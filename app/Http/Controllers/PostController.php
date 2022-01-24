<?php

namespace Club\Http\Controllers;

use Club\Post;
use Club\Type;
use Validator, Redirect, Response, File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::all();

        return view('Post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post=new Post;
        $type=Type::all();
        return view('Post.create',compact('post','type'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post){
        $type=Type::all();
        return view('Post.edit',compact('post','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $image=$request->file('image');
        $destinationPath = 'public/post/'; // upload path
        $profileImage = date('YmdHis') . "." . $image[0]->getClientOriginalExtension();
        $image[0]->move($destinationPath, $profileImage);
        $post=Post::create([
            'img'=> $destinationPath .''.$profileImage,
            'title'=>$request->title,
            'content'=>$request->content,
            'type_id'=>$request->type_id 
        ]);
        return Redirect::route('Post.index')->withSuccess('<script>swal({
            title: "Exito!",
            text: "Se a agregado un nuevo Post.",
            icon: "success",
        })</script>');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Club\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $post=Post::where('id',$id)->first();
        if($request->file('image')){            
            $image=$request->file('image');
            $destinationPath = 'public/post/'; // upload path
            $profileImage = date('YmdHis') . "." . $image[0]->getClientOriginalExtension();
            $image[0]->move($destinationPath, $profileImage);
            $path=$destinationPath .'/'.$profileImage;
        }else{
            $path= $post->img;
        }
        $post->update([
            'img'=>$path,
            'title'=>$request->title,
            'content'=>$request->content,
            'type_id'=>$request->type_id,
        ]);
        return Redirect::route('Post.index')->withSuccess('<script>swal({
            title: "Exito!",
            text: "Se a Edita el Post'.$post->title.' con exito.",
            icon: "success",
        })</script>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Club\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $post=Post::where('id',$id)->first();
        $post->delete();
        return $post;
    }
}
