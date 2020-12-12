<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shop;
use Illuminate\Http\Request;
use DB;
use App\Models\Post;
use PDF;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function _construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('title', 'desc');
        return view('/')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('post');
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
        $posts = Post::all();
        return view('publicInformation')->with('posts',$posts);;
    }
    public function deleteInfo(){
        $posts = Post::all();
        return view('deleteInfo')->with('posts',$posts);
        //return view('deleteInfo');
    }
    public function editInfo(){
        return view('editInfo');
    }

    public function createPDF() {

        $posts = Post::all();
        $pdf = PDF::loadview('ataskaita', compact('posts'));

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->created_at = date('Y-m-d H:i:s');
        $post->save();

        return redirect('/')->with('success','Skelbimas sukurtas sėkmingai');

    }

    public function search(Request $request){
        //dd($request);
        $uzklausa = '%'.$request->ieskoti.'%';
        $posts = DB::table('posts')->where('title', 'like', $uzklausa)->get();
        $paieska = $request->ieskoti;
        return view('welcome', compact('posts', 'paieska'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        return view('viewPost')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::find($id);
        return view('editInfo')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->created_at = date('Y-m-d H:i:s');
        $post->save();

        return redirect('/')->with('success','Skelbimas atnaujintas');
    }
    public function deletePost(Post $post) {
        return view('removePost')->with('post', $post);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return Redirect('/')->with('success', 'Skelbimas ištrintas');
    }
}
