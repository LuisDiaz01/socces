<?php

namespace Club\Http\Controllers;

use Club\Post;
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
        return view('Post.create');
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
        return Redirect::route('Post.index')->withSuccess('Se ha credo un club con exito');
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
        return $post;
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
