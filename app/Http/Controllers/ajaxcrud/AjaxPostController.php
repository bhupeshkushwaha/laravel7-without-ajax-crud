<?php

namespace App\Http\Controllers\ajaxcrud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Redirect,Response;

class AjaxPostController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::orderBy('id','desc')->paginate(5);
   
        return view('ajaxcrud.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post   =   Post::updateOrCreate(
                    ['id' => $request->post_id],
                    [
                        'title' => $request->title, 
                        'body' => $request->body
                    ]
                );
    
        return Response::json($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post  = Post::where(['id' => $id])->first();
 
        return Response::json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('id',$id)->delete();
   
        return Response::json($post);
    }
}

