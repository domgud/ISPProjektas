<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class InfoController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    public function post(){

        return view('post');
    }

    public function welcome(){

        $posts = Post::all();
        return view('welcome')->with('posts',$posts);
    }

    public function generatePublic(){
        return view('generatePublic');
    }
    public function publicInformation(){
        return view('publicInformation');
    }
    public function deleteInfo(){
        $posts = Post::all();
        return view('deleteInfo')->with('posts',$posts);
        //return view('deleteInfo');
    }
    public function editInfo(){
        return view('editInfo');
    }
}
