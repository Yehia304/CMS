<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    public function general(){
        if (Auth::check()){
            return redirect('/user/home');
        }
        else{
            $posts = DB::table('posts')
                ->orderBy('created_at')->paginate(5);
//            return $topics;

            return view('Guest.posts',['posts'=>$posts]);
        }

    }

    public function topics($argv){

       $posts =DB::table('topics')
           ->where('topics.topic_name',$argv)
           ->join('posts','topics.id','=','posts.topic_id')->paginate(5);

//       return $posts;
        return view('Guest.posts',['posts'=>$posts]);

    }
}
