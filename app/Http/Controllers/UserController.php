<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1){
            return redirect('/admin');
        }

        $posts = Auth::user()->posts;

//        return $posts;
        return view('User.posts',['posts'=>$posts]);
    }

    public function showNewPostForm(){

        $create = 1;

        return view('User.posts',['create'=>$create,'topics'=>Topic::all()->pluck('topic_name')->toArray()]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

//        return $request->all();

        $file = $request->file('post_thumbnail');

        $filename = $file->getClientOriginalName();

        $path = 'users/'. Auth::id() . '/'. $filename;

//        return $path;

        if (!file_exists($path)){

            $file->move('users/' . Auth::id(), $filename);
        }

        $post = new Post;
        $post->post_header = $request->post_header;
        $post->post_content = $request->post_content;
        $post->post_thumbnail = $path;
        $post->topic_id = Topic::where('topic_name',$request->topic_name)->first()->id;
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/user/home')->with('Postadded','Post created!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        $user =Auth::user();
        if ($user->id != $post->user_id and $user->is_admin != 1 ){
            return redirect('/user/home')->with('Unauthorized','You are unauthorized to edit/delete this post!');
        }
        else{
            $topics = Topic::all()->pluck('topic_name')->toArray();
            return view('User.editpost',['post'=>$post,'topics'=>$topics]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        return $request->all();
       $post = Post::find($request->post_id);

        $user =Auth::user();
        if ($user->id != $post->user_id and $user->is_admin != 1 ){

            return redirect('/user/home')->with('Unauthorized','You are unauthorized to edit/delete this post!');

        }
        else{
            if ($request->has('post_thumbnail')){
                $post->post_header = $request->post_header;
                $post->post_content = $request->post_content;
                $post->topic_id = $request->topic_id;
                $file = $request->file('post_thumbnail');

                $filename = $file->getClientOriginalName();

                $path = 'users/'. Auth::id() . '/'. $filename;

//        return $path;

                if (!file_exists($path)){

                    $file->move('users/' . Auth::id(), $filename);
                }

                $post->post_thumbnail = $path;
                $post->save();

            }
            else{
                $post->post_header = $request->post_header;
                $post->post_content = $request->post_content;
                $post->topic_id = $request->topic_id;

                $post->save();
            }

            return redirect('/user/home')->with('Updated');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
        $post = Post::find($post_id);
        $user=Auth::user();
        if ($user->id != $post->user_id and $user->is_admin != 1 ){

            return redirect('/user/home')->with('Unauthorized','You are unauthorized to edit/delete this post!');

        }
        else{
            $post->delete();
            return redirect()->back()->with('Deleted','Post deleted!');
        }


    }
}
